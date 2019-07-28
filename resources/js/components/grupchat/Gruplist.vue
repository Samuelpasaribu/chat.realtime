<template>
    <div class="card">
        <div class="card-content">
            Daftar Grup

            <div class="collection" v-for="grup in grups">
                <a :id="grup.id" :href="'/PushChat2/public/grup-chat/chat/'+ grup.grub_id" class="collection-item">{{ grup.grup.nama_grup }}</a>                
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                grups : []
            }
        },

        mounted() {
            this.getGrup()   
        },
        methods: {
            getGrup(){
                axios.get('/PushChat2/public/grup/get-grup').then(respone => {
                    this.grups = respone.data.reverse()
                    // this.scrollToBottom()
                    // console.log(respone);
                })

            },
        }
    }
</script>
