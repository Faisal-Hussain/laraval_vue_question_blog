<template>

    <div>
        <reply v-for="(reply,index) in content"
               :key="reply.id"
               :data="reply"
               :index=index
               v-if="content"></reply>
    </div>
</template>

<script>
import reply from "./reply";
export default {
    props:['question'],
    components:{reply},
name: "replies",
    data(){
        return{
            content:this.question.replies,
        }
    },
    created()
    {
        this.listen( )
    },
    methods:{
        listen(){
            EventBus.$on('newReply',(reply)=>{
                this.content.unshift(reply)
            })
            EventBus.$on('destroyReply',(index)=>{
                axios.delete(`/api/question/${this.question.id}/reply/${this.content[index].id}`)
                .then(res=>{
                    this.content.splice(index,1)
                })
            })
        }
    }
}
</script>

<style scoped>

</style>
