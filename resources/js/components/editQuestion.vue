<template>
    <v-container>

        <v-form @submit.prevent="update">
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
                required>

            </v-text-field>


            <vue-simplemde v-model="form.body" ref="markdownEditor" />

            <v-btn

                color="success"
                class="mr-4"
                type="submit"
            >
                update
            </v-btn>
            <v-btn @click="cancle"
                color="dark"
                class="mr-4"
                type="button"
            >
                cancle
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
name: "editQuestion",
    props:['data'],
    data(){
    return{
        form:{
            title:null,
            body:null,
        }
    }
    },
    mounted() {
    this.form=this.data
    },
    methods:{
        cancle()
        {
            EventBus.$emit('cancleEditing')
        },
        update()
        {
            axios.put(`/api/question/${this.data.id}`,this.form)
            .then(res=>this.cancle())
        }
    }
}
</script>

<style scoped>

</style>
