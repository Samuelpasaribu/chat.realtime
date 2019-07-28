<template>
    <div class="card">
        <div class="card-content">
            <private-message></private-message>
            <private-form></private-form>
        </div>
        
    </div>
</template>

<script>
    import Bus from '../../bus';

    export default {
        
        mounted() {
            // console.log('Component mounted.')
            //  Echo.private('private.'+Laravel.id_tujuan)
             Echo.private('privatechat')
            .listen('PrivateEvent', (message) => {
                // this.messages.push(message);
                // this.messages.push(message);
                Bus.$emit('private_chat.sent', message);

                
            });
            // .leave('privatechat', );
            console.log(Echo)

        }
    }
</script>
