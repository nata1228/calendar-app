<template>
    <div>
        <button type="button" class="zdo_drawer_button">
        <span class="zdo_drawer_bar zdo_drawer_bar1"></span>
        <span class="zdo_drawer_bar zdo_drawer_bar2"></span>
        <span class="zdo_drawer_bar zdo_drawer_bar3"></span>
        <span class="zdo_drawer_menu_text zdo_drawer_text">MENU</span>
        <span class="zdo_drawer_close zdo_drawer_text">CLOSE</span>
    </button>
    </div>
</template>

<script>
    const button = document.querySelector('.zdo_drawer_button');
        button.addEventListener('click',()=>{
        button.classList.toggle('active');
});
</script>