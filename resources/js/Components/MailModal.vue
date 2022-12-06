<template v-if="mailActive">
    <div class="mailmodal" :class = "{active : mailActive}">
        <input type="text" name="mail" placeholder="メールアドレス">
        <button>送信</button>
    </div>
</template>

<script>
export default{
    props:{
        mailActive: Boolean
    }
}
</script>