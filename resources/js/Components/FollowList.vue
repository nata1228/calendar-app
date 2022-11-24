<template>
    <div class="user_info" :class = "{active : isActive}">
        <ul class="list-group">
            <li class="list-group-item" v-for="user in users">{{user.name}}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    data() {
        followUsers:Array
    },
    props: {
        isActive: Boolean,
        users: Array,
    },
    methods: {
        getUser(){
            axios.get("/follow")
            .then(res => {
                console.log(res.data);
                this.followUsers = res.data;
            })
        }
    },
    mounted(){
        this.getUser();
    },
}
</script>