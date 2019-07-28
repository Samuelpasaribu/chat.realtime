<template>
    <div class="chat-list">
        <div class="messages" v-for="message in messages">
            <div v-if="message.user_id == user_id">
                <div class="messages-me">
                    <div class="user">
                        {{ message.user.name }} <span>{{ message.created_at }}</span>
                    </div>
                    <div class="message">
                        {{ message.chat }}
                    </div>
                </div>
            </div>

            <div v-if="message.user_id != user_id">
                <div class="messages-you">
                    <div class="user">
                        {{ message.user.name }} <span>{{ message.created_at }}</span>
                    </div>
                    <div class="message">
                        {{ message.chat }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from '../../bus';
    import { setTimeout } from 'timers';
    import moment from 'moment';

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
                messages : [],
                user_id : Laravel.user_id

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
                axios.get('/PushChat2/public/grup-chat/message/'+Laravel.grup_id).then(respone => {
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
        height: 430px;
        overflow-y: scroll;
    }

    .messages-me{
        background-color: #0176be;
        border-radius: 4px;
        /* width: 345px; */
        text-align: right;
        color: white;
        margin: 0;
        padding: 5px;

    }

    .messages-you{
        background-color: #b2dcf7;
        border-radius: 4px;
        /* width: 345px; */
        text-align: left;
        color: rgb(29, 28, 28);
        margin: 0;
        padding: 5px;

    }
</style>


