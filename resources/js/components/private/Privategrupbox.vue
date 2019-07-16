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
                console.log(message);
                console.log('Berhasssssiiiiiilll');
                // this.messages.push(message);
                Bus.$emit('private_chat.sent', message)

                console.log(Echo);

                
            });
            // .leave('privatechat', );
            console.log(Echo)

        }
    }
</script>
