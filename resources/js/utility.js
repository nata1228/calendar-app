export default {
    data(){
        return{
            schedules: [],
        }
    },
    methods:{
        displayButton(){
            axios.get("/button")
            .then(res => {
                this.schedules = res.data;
            })
        }
    }
}