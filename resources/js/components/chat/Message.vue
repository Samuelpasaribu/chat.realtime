<template>
    <div class="chat-list">
        <div class="messages" v-for="message in messages">
            <div class="user">
                {{ message.user.name }} <span>{{ message.created_at }}</span>
            </div>
            <div class="message">
                {{ message.subject }}
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from '../../bus';
import { setTimeout } from 'timers';

    export default {

        data(){
            return {
                messages : []
            }
        },
        mounted() {
            this.getMessages()

            Bus.$on('chat.sent', (newMessage) => {
                this.messages.push(newMessage)
                this.scrollToBottom()
            })
        },
        methods: {
            getMessages(){
                axios.get('/chat-message').then(respone => {
                    this.messages = respone.data.reverse()
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


