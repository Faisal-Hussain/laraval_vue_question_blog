<template>
<div>
    <Toolbar></Toolbar>
    <router-view></router-view>

</div>
</template>

<script>
import Toolbar from "./Toolbar";
import Login from "./Login";
import example from "./ExampleComponent";
export default {
name:'app-home',
    components: {Toolbar,Login,example}
}
</script>

<style>

</style>
