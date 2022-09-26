<template>
    <follow-component
    :user-id = "{{ json_encode(user.id) }}"
    :default-Followed = "{{ json_encode(defaultFollowed) }}"
    ></follow-component>

    <span class="float-right">
            <button v-if="!followed" type="button" class="btn-sm shadow-none border border-primary p-2" @click="follow(userId)"><i class="mr-1 fas fa-user-plus"></i>フォロー</button>
            <button v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unfollow(userId)"><i class="mr-1 fas fa-user-check"></i>フォロー中</button>
    </span>

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
        return {
            followed: false,
            followCount: 0,
        };
    },
    created(){
        this.followed = this.$defaultFollowed
        this.followCount = this.$defaultCount
    },
    props: {
        isActive: Boolean,
        users: Array,
        userId: Number,

    },
    props:['userId','defaultFollowed','defaultCount'],
    methods: {
        follow(userId){
            let url = `/users/${userId}/follow`

            axios.post(url)
            .then(res => {
                this.followed = true;
                this.followCount = res.data.followCount;
            })
            .catch(error => {
                alert(error)
            });
        },
        unfollow(userId){
            let url = `/users/${userId}/unfollow`

            axios.post(url)
            .then(res => {
                this.followed = false;
                this.followCount = res.data.followCount;
            })
            .catch(error => {
                alert(error)
            });
        }
    },
}
</script>