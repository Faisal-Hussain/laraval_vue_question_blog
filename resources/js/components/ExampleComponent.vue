<template>

            <v-form @submit.prevent="login">


                <v-text-field
                    label="E-mail"
                    v-model="form.email"
                    type="email"
                    required
                ></v-text-field>

                <v-text-field
                    label="Password"
                    v-model="form.password"
                    type="password"
                    required
                ></v-text-field>

                <v-btn

                    color="success"
                    class="mr-4"
                    type="submit"
                >
                    Submit
                </v-btn>

            </v-form>

</template>
<script>


export default {

    data(){
        return {
            form :{
                email:null,
                password:null
            }
        }
    },
    created() {
        if (User.loggedIn()){
            this.$router.push({name:'forum'})
        }
    },

    methods: {

        reset () {
            this.$refs.form.reset()
        },

        login(){
            User.login(this.form)
            this.$router.push({name:'forum'})
        }
    },
}
</script>

