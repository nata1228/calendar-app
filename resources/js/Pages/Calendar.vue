<template>
    <Header/>
    <h2>カレンダー{{ today }}</h2>
    <button @click="prevMonth">前の月</button>
    <button @click="nextMonth">次の月</button>
    <div class="month">
        <div class="week" v-for="(week ,index) in calendars" :key="index">
            <div class="day" v-for="(day ,index) in week" :key="index">
                {{ day.date}}
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import Header from "../Components/Header.vue";
export default{
    data() {
        return {
            currentDate: moment(),
            today: moment().format("YYYY,MM,DD"),
        };
    },
    props: {
        test: Number
    },
    components:{
        Header
    },
    methods: {
        getStartDate() {
            let date = moment(this.currentDate);
            //その月の1日を取得
            date.startOf("month");
            //1日の曜日を取得
            const youbiNum = date.day();
            //1日を含む週の日曜日を取得
            return date.subtract(youbiNum, "days");
        },
        getEndDate() {
            let date = moment(this.currentDate);
            date.endOf("month");
            const youbiNum = date.day();
            //最終日を含む土曜日を取得
            return date.add(6 - youbiNum, "days");
        },
        getCalendar() {
            let startDate = this.getStartDate();
            const endDate = this.getEndDate();
            //カレンダーの総日数を計算し７で割り、週数を計算
            const weekNumber = Math.ceil(endDate.diff(startDate, "days") / 7);
            let calendars = [];
            for (let week = 0; week < weekNumber; week++) {
                let weekRow = [];
                for (let day = 0; day < 7; day++) {
                    weekRow.push({
                        date: startDate.get("date"),
                    });
                    startDate.add(1, "days");
                }
                calendars.push(weekRow);
            }
            return calendars;
        },
        nextMonth() {
            this.currentDate = moment(this.currentDate).add(1, "month");
        },
        prevMonth() {
            this.currentDate = moment(this.currentDate).subtract(1, "month");
        },
    },
    mounted() {
        console.log(this.getCalendar());
        console.log(this.test);
    },
    computed: {
        calendars() {
            return this.getCalendar();
        },
    },
    components: { Header }
}
</script>