<template>
    <div>
        <vue-simplemde v-model="reply.body" ref="markdownEditor" ></vue-simplemde>
        <v-card-actions>
            <v-btn @click="update"

                color="warning"
                class="mr-4"
                type="submit"
            >
                update
            </v-btn>
            <v-btn @click="cancel"

                color="secondary"
                class="mr-4"
                type="button"
            >
                cancle
            </v-btn>
        </v-card-actions>
    </div>
</template>

<script>
export default {
    props:['reply'],
name: "editReply",
    methods:{
        cancel(){

            EventBus.$emit('cancleEditing')
        },
        update(){
            axios.patch(`/api/question/${this.reply.question_id}/reply/${this.reply.id}`,this.reply)
            .then(res=>this.cancel())
        }
    }
}
</script>

<style scoped>

</style>
