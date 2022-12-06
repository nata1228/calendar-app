<template>
    <header>
        <div id="hamburger">
            <button type="button" class="zdo_drawer_button" @click="(isHeader = !isHeader)" :class="{active : isHeader}">
                <span class="zdo_drawer_bar zdo_drawer_bar1"></span>
                <span class="zdo_drawer_bar zdo_drawer_bar2"></span>
                <span class="zdo_drawer_bar zdo_drawer_bar3"></span>
                <span class="zdo_drawer_menu_text zdo_drawer_text">MENU</span>
                <span class="zdo_drawer_close zdo_drawer_text">CLOSE</span>
            </button>
        </div>
        <img src="../../../public/images/user_icon.png" alt="" id="icon">
    </header>

    <FollowList :isHeader="isHeader" :users="users"/>
</template>

<script>
import FollowList from "../Components/FollowList.vue";

export default{
    data() {
        return {
            isHeader: false,
        };
    },
    props:{
        users: Array
    },
    components:{
        FollowList
    },
    methods: {
        //
    },
}
</script>