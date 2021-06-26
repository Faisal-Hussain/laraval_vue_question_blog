<template>

<div>
    <v-card>

        <v-card-title primary-title>
            <div>
                <router-link :to="{path:'question/'+question.id}">
                    <h3 class="headline mb-0">{{question.title}}</h3>
                </router-link>

                <h6 class="grey--text">{{question.created_at}}</h6>
            </div>
        </v-card-title>
        <v-card-text>
            {{question.body}}
        </v-card-text>

        <v-card-actions>
            <v-btn text color="orange">Share</v-btn>
            <v-btn text color="orange">Explore</v-btn>
        </v-card-actions>
    </v-card>
</div>

</template>

<script>
export default {
    props:['question'],

}
</script>

<style scoped>

</style>
