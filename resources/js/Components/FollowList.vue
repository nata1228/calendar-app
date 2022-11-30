<template>
    <div class="user_info" :class = "{active : isActive}">
        <ul class="list-group">
            <li class="list-group-item" v-for="user in followUsers">{{user.name}}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    data() {
        return {
            followUsers: [],
        };
    },
    props: {
        isActive: Boolean,
        users: Array,
    },
    methods: {
        getUser(){
            axios.get("/get")
            .then(res => {
                this.followUsers = res.data;
                console.log(res.data);
            })
        }
    },
    mounted(){
        this.getUser();
    },
}
</script>