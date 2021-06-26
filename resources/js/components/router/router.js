import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from '../Login';
import example from '../ExampleComponent';
import Forum from '../Forum';
import Logout from '../Logout';
import Read from '../Read';
import Create from "../Create";
import CreateCategory from "../CreateCategory";

const routes=[
    {path:'/login',component:Login},
    {path:'/example',component:example},
    {path:'/forum',component:Forum ,name:"forum"},
    {path:'/logout',component:Logout},
    {path:'/ask',component:Create,name: "Create"},
    {path:'/category',component:CreateCategory},
    {path:'/question/:question',component:Read,name:"read"},
]



const router=new VueRouter({
    routes,
    hashbang:false,
    mode:"history",

})
 export default router
