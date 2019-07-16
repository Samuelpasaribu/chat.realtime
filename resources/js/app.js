/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('chat-box', require('./components/chat/Chatbox.vue').default);
Vue.component('chat-user-lists', require('./components/chat/Userlist.vue').default);
Vue.component('chat-message', require('./components/chat/Message.vue').default);
Vue.component('chat-form', require('./components/chat/Form.vue').default);
// Vue.component('gruplist', require('./components/grupchat/GrupListComponent.vue').default);
Vue.component('grup-list', require('./components/grupchat/Gruplist.vue').default);
Vue.component('chat-grup-box', require('./components/grupchat/Chatgrupbox.vue').default);
Vue.component('grup-message', require('./components/grupchat/GrupMessage.vue').default);
Vue.component('grup-form', require('./components/grupchat/GrupForm.vue').default);

Vue.component('user-private-list', require('./components/private/Userprivatelist.vue').default);
Vue.component('private-message', require('./components/private/PrivateMessage.vue').default);
Vue.component('private-grup-box', require('./components/private/Privategrupbox.vue').default);
Vue.component('private-form', require('./components/private/PrivateForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Bus from './bus';


const app = new Vue({
    el: '#app',
    // created(){
        // window.Echo.private('grup.8')
        // .listen('GrupEvent', (e) => {
        //     console.log('-----Berhasil-----');
        //     console.log(e);
        //     // sdfdklfdsj
        //     // this.conversations.push(e);
        // });
        
    // }

    // created(){
       

       
    // }
});
