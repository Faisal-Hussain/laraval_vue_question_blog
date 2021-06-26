<template>
 <v-container>

     <v-form @submit.prevent="create">
        <v-text-field
        label="Title"
        v-model="form.title"
        type="text"
        required>

        </v-text-field>

         <v-select
         :items="categories"
         item-text="name"
         item-value="id"
         v-model="form.category_id"
         label="Category"
         autocomplete></v-select>

         <vue-simplemde v-model="form.body" ref="markdownEditor" />

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
import VueSimplemde from 'vue-simplemde'
export default {
    components: {
        VueSimplemde
    },
name: "Create",

    data(){
    return{
        form:{
            title:null,
            category_id:null,
            body:null,
        },
        categories:{},
        errors:{},
    }
    },
    created(){
        axios.get('/api/category')
            .then(res=>this.categories=res.data)
    },
    methods:{
        create(){
            axios.post('/api/question',this.form)
            .then(res=>this.$router.push('/forum'))
            .catch(error=>this.errors=error.response.data.error)
        }
    },

}
</script>

<style scoped>
@import '~simplemde/dist/simplemde.min.css';
</style>
