<template>
    <div class="form-message">
        <div class="row">

            <div class="col m10 s8">
                <div class="form-group">
                    <textarea class="materialize-textarea" placeholder="Tulis Pesan" name="message" id="" v-model="body" rows="4" @keydown="handleInput"></textarea>
                </div>
            </div>
            <div class="col m2 s4">
                <button class="btn waves-effect waves-light" v-on:click="handleKirim" name="action">Kirim
                    <i class="material-icons right">send</i>
                </button>
            </div>

        </div>
        
    </div>
</template>

<script>
    import Bus from '../../bus';
    import moment from 'moment';
    export default {

        data(){
            return {
                body : null
            }
        },

        methods: {
            handleInput(e){
                if(e.keyCode === 13 && !e.shiftKey){
                    e.preventDefault();
                    this.submit();
                }
            },
            handleKirim(e){
                // alert('Hai');\
                e.preventDefault();
                this.submit();
            },

            submit(){
                if(!this.body || this.body.trim() === ''){
                    return
                }

                let newMessage = {
                    chat : this.body.trim(),
                    created_at : moment().utc(0).format('YYYY-MM-DD HH:mm:ss'),
                    user : {
                        name : Laravel.user.name
                    },
                    user_id : Laravel.user_id
                }

                axios.post('/PushChat2/public/private/message', {chat: this.body.trim(), user_id_tujuan: Laravel.id_tujuan })
                .then(respone => {
                    Bus.$emit('private_chat_me.sent', newMessage)

                    this.body = ''
                    // console.log(respone);
                })
            }
        }
    }
</script>

<style lang="scss">
    textarea{
        width: 100%;
        margin-top: 10px;
    }

</style>

