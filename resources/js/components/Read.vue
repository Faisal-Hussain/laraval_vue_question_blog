<template>


    <div v-if="data">
        <editQuestion
            v-if="editing"
            :data=data>
        </editQuestion>
        <show-question
            v-else
            :data=data>

        </show-question>
        <v-container>
            <replies :question="data"></replies>
            <new-reply :questionId="data.id"></new-reply>
        </v-container>
    </div>
</template>

<script>
import ShowQuestion from "./ShowQuestion";
import editQuestion from "./editQuestion"
import replies from "./reply/replies";
import newReply from "./reply/newReply";
export default {
name: "Read",
    components:{ShowQuestion,editQuestion,replies,newReply},
    data(){
        return{
            data:null,
            editing:false,
        }
    },
    created(){
        this.listen()
        this.getQuestion()

    },
    methods:{
        listen(){
            EventBus.$on('startEditing',()=>{
                this.editing=true
            })
            EventBus.$on('cancleEditing',()=>{
                this.editing=false
            })

        },
        getQuestion(){
            this.id=this.$route.params.question
            axios.get('/api/question/'+this.id)
                .then(res => this.data=res.data)
                .catch(error=>console.log(error.response.data))
        }
    }
}
</script>

<style scoped>

</style>
