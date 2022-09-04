<template>
    <div id="hamburger">
        <button type="button" class="zdo_drawer_button" @click="clickMenu()">
        <span class="zdo_drawer_bar zdo_drawer_bar1"></span>
        <span class="zdo_drawer_bar zdo_drawer_bar2"></span>
        <span class="zdo_drawer_bar zdo_drawer_bar3"></span>
        <span class="zdo_drawer_menu_text zdo_drawer_text" v-if="isActive" v-bind="isActive">MENU</span>
        <span class="zdo_drawer_close zdo_drawer_text" v-else>CLOSE</span>
    </button>
    </div>
</template>

<script>
import { createApp, VueElement } from 'vue';

createApp({
    el: '#app',
    data: {
        isActive: true,
    },
    methods: {
        clickMenu(){
            this.isActive = false;
        }
    }
}).mount("#hamburger");
</script>