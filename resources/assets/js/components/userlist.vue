<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-for="user in users">
                <div v-on:click="showid(user.id)" >{{user.name}} <span class="text-success pull-right" v-if="user.id === current_id">( ME )</span></div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['users', 'current_id'],

        data: {
            id: 2,
        },

        methods: {
            showid(id){
                this.id = id;
                console.log(this.id);
            }
        }

    }

</script>
