<template>
<v-card>
    <v-card-title>
        <div>
            <div class="headline">
                {{data.title}}
            </div>
            <span class="grey--text">{{data.created_at}}

            </span>
        </div>
        <v-spacer></v-spacer>
        <v-btn color="teal"><span style="color:white"> Replies</span></v-btn>
    </v-card-title>
    <v-card-text v-html="body"></v-card-text>
    <v-card-actions>
        <v-btn  small @click="edit">
            <v-icon color="orange">edit</v-icon>
        </v-btn>
        <v-btn  small @click="destroy">
            <v-icon color="red">delete</v-icon>
        </v-btn>
    </v-card-actions>
</v-card>
</template>

<script>
import md from "marked";
export default {
name: "ShowQuestion",
    props:['data'],
    computed:{
    body(){
        return md.parse(this.data.body)
    },
    },
    methods:{
    destroy(){
        axios.delete(`/api/question/${this.data.id}`)
        .then(this.$router.push('/forum'))
        .catch(error=>console.log(error.response.data))
    },
        edit(){
            EventBus.$emit('startEditing')
        }
    }
}
</script>

<style scoped>

</style>
