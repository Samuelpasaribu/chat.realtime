<template>
    <div class="chat-list">
        <div class="messages" v-for="message in messages">
            <div class="user">
                {{ message.user.name }} <span>{{ message.created_at }}</span>
            </div>
            <div class="message">
                {{ message.chat }}
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from '../../bus';
import { setTimeout } from 'timers';
import { log } from 'util';

    export default {
        // ready(){
        //     Echo.private('grup-chat.' + Laravel.grup_id)
        //     // window.Echo.private('grup-chat.8')
        //     .listen('GrupEvent', (e) => {
        //         console.log('-----Berhasil-----');
        //         // sdfdklfdsj
        //         // this.conversations.push(e);
        //     });
        // },
        data(){
            return {
                messages : []
            }
        },
        mounted() {
            this.getMessages()

            Bus.$on('grup_chat.sent', (newMessage) => {
                this.messages.push(newMessage);
                // console.log(newMessage);
                this.scrollToBottom();
            });


        },
        methods: {
            getMessages(){     
                axios.get('/grup-chat/message/'+Laravel.grup_id).then(respone => {
                    this.messages = respone.data.reverse()
                    // console.log(respone);
                    this.scrollToBottom()
                })

            },
            scrollToBottom(){
                setTimeout(function() {
                    let chatList = document.getElementsByClassName('chat-list')[0];
                    chatList.scrollTop = chatList.scrollHeight
                }, 1)
            }
        }
    }
</script>


<style lang="scss">
    .messages{
        margin-top: 10px;
        background-color: white;
        border-radius: 3px;
        padding: 5px;

        .user span{
            font-weight: bold;
        }

        .message{
            font-size: 1.2rem;
        }
    }

    .chat-list{
        height: 450px;
        overflow-y: scroll;
    }
</style>


