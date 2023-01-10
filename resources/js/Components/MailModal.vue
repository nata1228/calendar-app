<template>
    <div v-if="mailActive">
        <div class="mailmodal" :class = "{active : mailActive}">
            <div class="mail-items">
                <input type="text" name="email" placeholder="メールアドレス" v-model="email">
                <button class="original-button" @click="sendMail" :class="{active : mailActive}">送信</button>
                {{ messege }}
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
            messege:''
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
                if(res.data.statas === 200){
                    this.email = '';
                    this.$emit('mailModal', false);
                }else{
                    this.messege = 'ユーザーが存在しません'
                }
            })
        },
    }
}
</script>