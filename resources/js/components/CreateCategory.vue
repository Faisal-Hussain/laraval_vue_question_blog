<template>
    <v-container>

        <v-form @submit.prevent="create">
            <v-text-field
                label="Category Name"
                v-model="form.name"
                type="text"
                required>

            </v-text-field>

            <v-btn v-if="editslug"

                color="warning"
                class="mr-4"
                type="submit"
            >
                update
            </v-btn>
            <v-btn v-else

                color="success"
                class="mr-4"
                type="submit"
            >
                Submit
            </v-btn>
        </v-form>
        <v-card class="mt-10">
            <v-toolbar color="info" dark>
                <v-toolbar-title>Category</v-toolbar-title>
            </v-toolbar>


                    <v-list class="mt-2 pl-2">
                        <div>
                            <v-list-item
                                v-for="(category,index) in categories" :key="category.id"
                            >
                                <v-list-item-content>
                                    <v-list-item-title>{{category.name}}</v-list-item-title>
                                </v-list-item-content>
                                <v-btn class="success" @click="edit(category.id,index)">edit</v-btn>
                                <v-btn class="danger" color="red" @click="destroy(category.id)">delete</v-btn>
                            </v-list-item>
                        </div>

            </v-list>

        </v-card>
    </v-container>
</template>

<script>
export default {
name: "CreateCategory",
    data(){
    return{
        form:{
            name:null,
        },
        categories:{},
        editslug:null,
    }
    },
    created(){
    if(!User.admin())
    {
        this.$router.push('/forum')
    }
        axios.get('/api/category')
            .then(res=>this.categories=res.data)
    },
    methods:{
    create(){
        this.editslug ? this.update() : this.new_category()
    },
        new_caterory()
        {
            axios.post('/api/category',this.form)
                .then(res=> {
                    this.categories.unshift(res.data)
                    this.form.name=null
                })
        },
        update() {
            axios.patch(`/api/category/${this.editslug}`, this.form)
                .then(res => {
                    console.log(res)
                    this.categories.unshift(res.data)
                    this.form.name = null
                    this.editslug=null
                })
            },
        destroy(id,index){
          axios.delete(`/api/category/${id}`)
            .then(res=>this.categories.splice(index,1))
        },
        edit(id,index){
            this.form.name=this.categories[index].name
            this.editslug=this.categories[index].id
            this.categories.splice(index,1)
        }
    }
}
</script>

<style scoped>

</style>
