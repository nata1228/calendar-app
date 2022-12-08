<template>
    <div v-if="mailActive">
        <div class="mailmodal" :class = "{active : mailActive}">
            <div class="mail-items">
                <input type="text" name="email" placeholder="メールアドレス">
                <button class="original-button" @click="sendMail" :class="{active : mailActive}">送信</button>
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
        };
    },
    props:{
        mailActive: Boolean
    },
    methods:{
        sendMail(){
            axios.get("/mail/send",{
                email: this.email
            })
            .then(res => {
                this.email = '';
                this.$emit('mailModal', false);
            })
        }
    }
}
</script>