<template>
    <div class="card">
        <div class="card-content">
            <grup-message></grup-message>
            <grup-form></grup-form>
        </div>
        
    </div>
</template>

<script>
    import Bus from '../../bus';

    export default {
        
        mounted() {
            // console.log('Component mounted.')
             Echo.private('grup.'+Laravel.grup_id)
            .listen('GrupEvent', (message) => {
                // this.messages.push(message);
                // console.log('message');
                // this.messages.push(message);
                Bus.$emit('grup_chat.sent', message)
            });

            console.log(Echo);
        }
    }
</script>
