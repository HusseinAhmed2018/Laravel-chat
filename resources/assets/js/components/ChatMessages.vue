<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix" :class="{'pull-right':current_id == message.user.id}">
                <div class="header" :class="{'text-right text-success':current_id == message.user.id, 'text-danger' : current_id != message.user.id, }">

                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <div>
                    {{ message.message }}
                </div>
            </div>
        </li>
    </ul>
</template>

<script>

    export default {
        props: ['messages','current_id','count','emoji'],
    };
</script>