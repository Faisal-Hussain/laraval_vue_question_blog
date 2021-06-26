<template>
    <v-card>
        <v-toolbar color="orange" dark>
            <v-toolbar-title>Category</v-toolbar-title>
        </v-toolbar>
        <v-list class="mt-2 pl-2">
            <v-list-item
                v-for="category in categories" :key="category.id"
            >
                <v-list-item-content>
                    <v-list-item-title>{{category.name}}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>

    </v-card>
</template>

<script>
export default {
name: "AppSidebar",
    data(){
        return{
            categories:{},
        }
    },
    created(){
        axios.get('/api/category')
        .then(res=>this.categories=res.data)
    }

}
</script>

<style scoped>

</style>
