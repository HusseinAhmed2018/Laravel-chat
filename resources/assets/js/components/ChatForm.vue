<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage(2)">
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage(2)">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage(user_id) {
                this.user_id = user_id;
                console.log(this.user_id );
                this.$emit('messagesent', {
                    user: this.user,
                    user_id : this.user_id,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }
    }
</script>