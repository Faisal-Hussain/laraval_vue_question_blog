<template>
    <v-toolbar>

        <v-toolbar-title>Vue </v-toolbar-title>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-down">
            <router-link
                v-for="item in items"
                :key="item.title"
                :to="item.to"
                v-if="item.show">
                <v-btn >{{item.title}}</v-btn>
            </router-link>

        </div>

    </v-toolbar>
</template>

<style scoped>

</style>

<script>

export default {

    data(){
        var user=User.loggedIn()
        return {

            items: [
                {title : "Forum",to:"/forum", show:true},
                {title : "Ask Question",to:"/ask",show: user},
                {title : "Category",to:"/category",show: User.admin()},
                {title : "Login",to:"/example", show: !User.loggedIn()},
                {title : "logout",to:"/logout",show: User.loggedIn()},
            ]
        }
    },
    created()
    {
        EventBus.$on('logout',()=>{
            User.logout()
        })
    }
}
</script>
