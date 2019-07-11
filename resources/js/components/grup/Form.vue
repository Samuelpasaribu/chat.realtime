<template>
    <div class="form-message">
        <div class="form-group">
            <textarea class="materialize-textarea" placeholder="Tulis Pesan" name="message" id="" v-model="body" rows="4" @keydown="handleInput"></textarea>
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

            submit(){
                if(!this.body || this.body.trim() === ''){
                    return
                }

                let newMessage = {
                    subject : this.body.trim(),
                    created_at : moment().utc(0).format('YYYY-MM-DD HH:mm:ss'),
                    user : {
                        name : Laravel.user.name
                    }
                }

                axios.post('/message', {subject: this.body.trim()})
                .then(respone => {
                    Bus.$emit('chat.sent', newMessage)

                    this.body = ''
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

