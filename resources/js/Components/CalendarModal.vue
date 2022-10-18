<template>
    <div class="calendarmodal" :class = "{active : isActive}">
        <h1>日付</h1>
        <input type="date">
        <h1>予定名</h1>
        <input type="text">
        <h1>コメント</h1>
        <input type="text">
        <button class="btn btn-primary btn-sm" type="button" >完了</button>
    </div>
    
</template>

<script>

export default{
    data() {
        return {
            //
        };
    },
    props:{
        isActive: Boolean
    },
    components:{
        //
    },
    methods: {
        //
    },
}
</script>