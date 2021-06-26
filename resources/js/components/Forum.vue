<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>

                <question
                v-for="question in questions"
                :key="question.path"
                :question=question>
                </question>
            </v-flex>

            <v-flex xs4>
                <AppSidebar></AppSidebar>
            </v-flex>
        </v-layout>

    </v-container>
</template>

<script>
import Question from "./Question";
import AppSidebar from "./AppSidebar";
export default {
    data(){
        return {
            questions:{}
        }
    },
    components: {Question,AppSidebar},
    created(){
        axios.get('/api/question')
            .then(res => this.questions = res.data)
            .catch(error=>console.log(error.response.data))
    }
}

</script>

<style scoped>

</style>
