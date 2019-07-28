<template>
    <div class="chat-list">
        <div class="messages" v-for="message in messages">
            <!-- @if(Laravel.id_tujuan == newMessage.user_id){ -->
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
                
                
            <!-- } -->
            
            
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
                messages : [],
                user_id : Laravel.user_id
            }
        },
        mounted() {
            this.getMessages()

            Bus.$on('private_chat.sent', (newMessage) => {
                console.log(newMessage.user_id_tujuan);
                if(newMessage.user_id_tujuan ==  Laravel.user_id && Laravel.id_tujuan == newMessage.user_id){
                    // if(){
                        this.messages.push(newMessage);
                    // }
                }

                if(Laravel.id_tujuan != newMessage.user_id){
                //     axios.post('/private/status', {status: 0, user_id_tujuan: Laravel.id_tujuan })
                //     .then(respone => {
                //         Bus.$emit('private_chat_me.sent', newMessage)

                //         this.body = ''
                //         // console.log(respone);
                //     })
                // }else{
                    axios.post('/PushChat2/public/private/status', {status: 1, user_id_tujuan: Laravel.id_tujuan })
                    .then(respone => {
                        // Bus.$emit('private_chat_me.sent', newMessage)

                        this.body = ''
                        // console.log(respone);
                    })
                }

                

                // if( newMessage.user_id == Laravel.user_id){
                //     this.messages.push(newMessage);
                // }
                // console.log(newMessage);
                this.scrollToBottom();
            });

            Bus.$on('private_chat_me.sent', (newMessage) => {
                console.log(newMessage.user_id_tujuan);
                // if(newMessage.user_id_tujuan ==  Laravel.user_id || Laravel.id_tujuan == newMessage.user_id){
                    // if(){
                        this.messages.push(newMessage);
                    // }
                // }

                // if( newMessage.user_id == Laravel.user_id){
                //     this.messages.push(newMessage);
                // }
                // console.log(newMessage);
                this.scrollToBottom();
            });

            console.log(Laravel.id_tujuan);


        },
        methods: {
            getMessages(){     
                axios.get('/PushChat2/public/private/message/'+Laravel.id_tujuan).then(respone => {
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
        // margin-top: 5px;
        margin: 0;
        background-color: white;
        border-radius: 3px;
        // padding: 5px;

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


