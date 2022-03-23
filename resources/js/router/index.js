import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import productIndex from '../views/products/Index.vue'
import productEdit from '../views/products/Edit.vue'
import notFound from '../components/notFound.vue'

const routes = [
    {
        path:'/',
        name:'home',
        component: Home
    },
    {
        path:'/product',
        name:'product',
        component: productIndex
    },
    {
        path:'/product/add',
        name:'product-add',
        component: productEdit
    },
    {
        path:'/:pathMatch(.*)*',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router