import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './components/Home'
import App from './components/App'
import SingleProduct from './components/SingleProduct'
import ShoppingCart from './components/ShoppingCart.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/products/:id',
            name: 'single-products',
            component: SingleProduct
        },
    ],

});


const app = new Vue({
    el: '#app',
    components: {App},
    router,
});
