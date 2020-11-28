import  Vue from 'vue'
import  VueRoute from 'vue-router'

// import Test from "./components/Test";
import create from "./components/posts/create";
import index from "./components/posts/index";
import edit from "./components/posts/edit";

const routes =[
    // {
    //     path : '/test',
    //     component : Test
    // },
    {
        path : '/post/create',
        component : create
    },
    {
        path : '/',
        component : index
    },
    {
        path : '/post/edit/:id',
        component : edit
    },
];

Vue.use(VueRoute);
const Router  = new VueRoute({
    routes,
    mode:'history',
});

export default Router
