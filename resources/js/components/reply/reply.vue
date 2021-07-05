<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <v-card-subtitle><strong>Statement</strong></v-card-subtitle>
                <v-divider></v-divider>
                <v-spacer></v-spacer>
                <like :data=data></like:>

            </v-card-title>
            <edit-reply v-if="editing" :reply="data"></edit-reply>
            <v-card-text v-else v-html="data.body" ></v-card-text>
            <div v-if="!editing">
                <v-card-actions v-if="login">
                    <v-btn  xs @click="edit">
                        <v-icon color="orange">edit</v-icon>
                    </v-btn>
                    <v-btn  xs>
                        <v-icon color="red" @click="destroy">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
import editReply from "./editReply";
import like from "../like";

export default {
    props:['data','index'],
    components:{editReply,like},
name: "reply",
    data(){
        return{
            editing:false
        }
    },
    computed:{
        login(){
            return User.loggedIn()
        },

    },
    created(){
        this.listen()
    },
    methods:{
        destroy()
        {
            EventBus.$emit('destroyReply',this.index)
        },
        edit()
        {
            this.editing=true
        },
        listen(){
            EventBus.$on('cancleEditing',()=>{
                this.editing=false
            })
        }
    }

}
</script>

<style scoped>

</style>
