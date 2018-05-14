
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
 // Vue.component('chat-form', require('./components/ChatForm.vue').default);
 // Vue.component('user-list', require('./components/userlist.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
Vue.component('user-list', require('./components/userlist.vue'));

 const app = new Vue({

     el: '#app',

     data: {
         messages: [],
         current_id:0,
         count:0,
         emoji:0,
         users:[],
         send_id:0
     },

    created() {
        this.fetchMessages();
        this.allUsers();

    },

    methods: {

        fetchMessages() {
            axios.get('/messages/' + 3).then(response => {
                this.messages = response.data.users;
                this.emoji = response.data.emoji;
                this.current_id = response.data.current_id;
                this.count = response.data.count;
        });
            Echo.private('chat')
                .listen('MessageSent', (e) => {
                this.messages.push({
                message: e.message.message,
                user: e.user
            });
        });
        },

        addMessage(message) {
            this.messages.push(message);
            console.log(message);
            axios.post('/messages/' + 1, message).then(response => {
                console.log(response.data);
        });
        },

        allUsers(){
            axios.get('/user').then(response => {
                this.users = response.data.users;

            });
        }

    }
   });