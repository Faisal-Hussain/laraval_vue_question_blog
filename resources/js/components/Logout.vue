<template>

</template>

<script>
export default {
name: "Logout",
    created() {
    EventBus.$emit('logout')

    }
}
</script>

<style scoped>

</style>
