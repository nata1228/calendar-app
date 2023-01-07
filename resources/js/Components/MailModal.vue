<template>
    <div v-if="mailActive">
        <div class="mailmodal" :class = "{active : mailActive}">
            <div class="mail-items">
                <input type="text" name="email" placeholder="メールアドレス" v-model="email">
                <button class="original-button" @click="sendMail" :class="{active : mailActive}">送信</button>
                <button @click="invitationUser">aaa</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default{
    data(){
        return {
            email:'',
            statas:''
        };
    },
    props:{
        mailActive: Boolean
    },
    methods:{
        sendMail(){
            axios.post("/mail/send",{
                email: this.email
            })
            .then(res => {
                console.log(res.data);
                this.email = '';
                this.$emit('mailModal', false);
            })
        },
        invitationUser(){
            axios.post("/invitation",{
                email: this.email
            })
            .then(res => {
                this.email = '';
            })
        }
    }
}
</script>