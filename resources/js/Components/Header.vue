<template>
    <header>
        <div id="hamburger">
            <button type="button" class="zdo_drawer_button" @click="menuButton()" v-bind:class = "{active : isActive}">
            <span class="zdo_drawer_bar zdo_drawer_bar1"></span>
            <span class="zdo_drawer_bar zdo_drawer_bar2"></span>
            <span class="zdo_drawer_bar zdo_drawer_bar3"></span>
            <span class="zdo_drawer_menu_text zdo_drawer_text">MENU</span>
            <span class="zdo_drawer_close zdo_drawer_text">CLOSE</span>
        </button>
        </div>
        <img src="../../../public/imeges/user_icon.png" alt="" id="icon">
    </header>

    <FollowList/>
</template>

<script>
    import FollowList from "../Components/FollowList.vue";
export default{
    data() {
        return {
            isActive: false,
        };
    },
    components:{
        FollowList
    },
    methods: {
        menuButton(){
            if(this.isActive == true){
                this.isActive = false;
            }else{
                this.isActive = true;
            }            
        },
        clickMenu(){
            if(this.isActive == true){
                this.FollowList.display = block
            }else{
                this.FollowList.display = none
            }
        },
    },
    components: { FollowList }
}
</script>