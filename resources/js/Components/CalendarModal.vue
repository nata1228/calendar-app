<template>
    <div class="calendarmodal" :class = "{active : isActive}">
        <button class="close_btn" @click="isActive = !isActive" :class="{active : isActive}"></button>
        <h1>予定名</h1>
        <input type="text" name="schedule_name" v-model="schedule_name">
        <VSwatches v-model="button_color"></VSwatches>
        <h1>日付</h1>
        <input type="date" name="start_date" v-model="start_date">
        <span>~</span>
        <input type="date" name="end_date" v-model="end_date">
        <h1>時間</h1>
        <select name="start_time" v-model="start_time">
            <option value="">--任意--</option>
            <option value="0:00">0:00</option>
            <option value="0:30">0:30</option>
            <option value="1:00">1:00</option>
            <option value="1:30">1:30</option>
            <option value="2:00">2:00</option>
            <option value="2:30">2:30</option>
            <option value="3:00">3:00</option>
            <option value="3:30">3:30</option>
            <option value="4:00">4:00</option>
            <option value="4:30">4:30</option>
            <option value="5:00">5:00</option>
            <option value="5:30">5:30</option>
            <option value="6:00">6:00</option>
            <option value="6:30">6:30</option>
            <option value="7:00">7:00</option>
            <option value="7:30">7:30</option>
            <option value="8:00">8:00</option>
            <option value="8:30">8:30</option>
            <option value="9:00">9:00</option>
            <option value="9:30">9:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
            <option value="17:30">17:30</option>
            <option value="18:00">18:00</option>
            <option value="18:30">18:30</option>
            <option value="19:00">19:00</option>
            <option value="19:30">19:30</option>
            <option value="20:00">20:00</option>
            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
            <option value="21:30">21:30</option>
            <option value="22:00">22:00</option>
            <option value="22:30">22:30</option>
            <option value="23:00">23:00</option>
            <option value="23:30">23:30</option>
        </select>
        <button class="btn btn-primary btn-sm" type="button" @click="createSchedule" :class="{active : isActive}">完了</button>
    </div>
    
</template>

<script>
import VSwatches from 'vue3-swatches';
import Mixin from './../utility';

export default{
    data() {
        return {
            schedule_name:'',
            start_date:'',
            end_date:'',
            start_time:'',
            button_color:'#fff',
            new_schedule:[]
        };
    },
    props:{
        isActive: Boolean
    },
    components:{
        VSwatches ,
        Mixin,
    },
    methods: {
        createSchedule(){
            axios.post("/schedule",{
                schedule_name: this.schedule_name,
                start_date: this.start_date,
                end_date: this.end_date,
                start_time: this.start_time,
                button_color: this.button_color,
            })
            .then(res => {
                this.new_schedule = res.data;
                this.schedule_name = '';
                this.start_date = '';
                this.end_date = '';
                this.start_time = '';
                this.button_color = '';
                this.$emit('closeModal',false);
                this.$emit('addButton',this.new_schedule);
            })
        },
    },
}
</script>