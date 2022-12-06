<template>
    <Mail :mailActive="mailActive"/>

    <div class="user_info" :class = "{active : isHeader}">
        <button class="original-button" id="invitation_button" @click="mailActive = !mailActive" :class="{active : mailActive}">招待する</button>
        <ul class="list-group">
            <li class="list-group-item" v-for="user in users">{{user.name}}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';
import Mail from "../Components/MailModal.vue"

export default{
    data() {
        return {
            mailActive: false,
        }
    },
    props: {
        isHeader: Boolean,
        users: Array,
    },
    components:{
        Mail
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