<template>
    <div class="calendarmodal" :class = "{active : isActive}">
        <h1>予定名</h1>
        <input type="text" name="schedule_name" v-model="schedule_name">
        <h1>日付</h1>
        <input type="date" name="start_date" v-model="start_date">
        <span>~</span>
        <input type="date" name="end_date" v-model="end_date">
        <h1>時間</h1>
        <select name="time" v-model="time">
            <option value="">--任意--</option>
            <option value="time">0:00</option>
            <option value="time">0:30</option>
            <option value="time">1:00</option>
            <option value="time">1:30</option>
            <option value="time">2:00</option>
            <option value="time">2:30</option>
            <option value="time">3:00</option>
            <option value="time">3:30</option>
            <option value="time">4:00</option>
            <option value="time">4:30</option>
            <option value="time">5:00</option>
            <option value="time">5:30</option>
            <option value="time">6:00</option>
            <option value="time">6:30</option>
            <option value="time">7:00</option>
            <option value="time">7:30</option>
            <option value="time">8:00</option>
            <option value="time">8:30</option>
            <option value="time">9:00</option>
            <option value="time">9:30</option>
            <option value="time">10:00</option>
            <option value="time">10:30</option>
            <option value="time">11:00</option>
            <option value="time">11:30</option>
            <option value="time">12:00</option>
            <option value="time">12:30</option>
            <option value="time">13:00</option>
            <option value="time">13:30</option>
            <option value="time">14:00</option>
            <option value="time">14:30</option>
            <option value="time">15:00</option>
            <option value="time">15:30</option>
            <option value="time">16:00</option>
            <option value="time">16:30</option>
            <option value="time">17:00</option>
            <option value="time">17:30</option>
            <option value="time">18:00</option>
            <option value="time">18:30</option>
            <option value="time">19:00</option>
            <option value="time">19:30</option>
            <option value="time">20:00</option>
            <option value="time">20:30</option>
            <option value="time">21:00</option>
            <option value="time">21:30</option>
            <option value="time">22:00</option>
            <option value="time">22:30</option>
            <option value="time">23:00</option>
            <option value="time">23:30</option>
        </select>
        <button class="btn btn-primary btn-sm" type="button" @click="createSchedule">完了</button>
    </div>
    
</template>

<script>

export default{
    data() {
        return {
            schedule_name:'',
            start_date:'',
            end_date:'',
            time:'',
        };
    },
    props:{
        isActive: Boolean
    },
    components:{
        //
    },
    methods: {
        createSchedule(){
            axios.get("/create",{
                schedule_name: this.schedule_name,
                start_date: this.start_date,
                end_date: this.end_date,
                time: this.time,
            })
            .then(res => {
                this.schedule_name = '';
                this.start_date = '';
                this.end_date = '';
                this.time = '';
            })
        }
    },
}
</script>