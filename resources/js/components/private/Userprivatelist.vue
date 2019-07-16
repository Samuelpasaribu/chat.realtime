<template>
    <div class="card">
        <div class="card-content box-height">
            Daftar User

            <div class="collection" v-for="user in users">
                <a :id="user.id" :href="'/private/chat/'+ user.id" class="collection-item">{{ user.name }}</a>                
            </div>
        </div>
    </div>
</template>

<style>

    .box-height{
        height: 557px;
        overflow-y: scroll;
    }

</style>


<script>
    export default {

        data(){
            return{
                users : []
            }
        },

        mounted() {
            this.getGrup()   
        },
        methods: {
            getGrup(){
                axios.get('/private/get-user').then(respone => {
                    this.users = respone.data
                    // this.scrollToBottom()
                    // console.log(respone);
                })

            },
        }
    }
</script>
