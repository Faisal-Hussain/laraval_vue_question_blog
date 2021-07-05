<template>
    <div>
        <v-btn @click="likedit"
            class="mx-2"
            fab
            dark
            small
            :color="color"
        >
            <v-icon dark>
                mdi-heart
            </v-icon>
        </v-btn>{{count}}
    </div>
</template>

<script>
export default {
    props:['data'],
    name: "like",
    data(){
        return{
            liked:false,
            count:this.data.like.length
        }
    },
    computed:{
        color()
        {
          return this.liked ?'green':'grey'
        }

    },
    created(){
        Echo.channel('likeChannel')
        .listen('LikeEvent',(e)=>{
            if(this.data.id === e.id){
                e.type===1 ? this.incr():this.decr()
            }
        });
    },
    methods:{
        likedit(){
            if (User.loggedIn())
            {
                this.liked ? this.decr() :this.incr()
                this.liked=! this.liked
            }
        },
        incr(){
            axios.post(`/api/like/${this.data.id}`)
            .then(res=>this.count=this.count+1)


        },
        decr(){
            axios.delete(`/api/like/${this.data.id}`)
                .then(res=>this.count=this.count-1)


        }
    }
}
</script>

<style scoped>

</style>
