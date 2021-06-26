<template>
    <v-container>
        <v-form @submit.prevent="create">

            <vue-simplemde v-model="body" ref="markdownEditor" ></vue-simplemde>

            <v-btn

                color="success"
                class="mr-4"
                type="submit"
            >
                Submit
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
    props:['questionId'],
name: "newReply",

    data(){
    return{
            body:null,
    }
    },
    methods:{
    create(){
        axios.post(`/api/question/${this.questionId}/reply`,{body:this.body})
        .then(res=>{
            this.body =null
            EventBus.$emit('newReply',res.data)
            window.scrollTo(0,0)
        })
    }
    }
}
</script>

<style scoped>

</style>
