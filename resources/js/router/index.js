import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import productIndex from '../views/products/Index.vue'
import productCreate from '../views/products/Create.vue'
import productEdit from '../views/products/Edit.vue'
import productView from '../views/products/View.vue'
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
        component: productCreate
    },
    {
        path:'/product/edit',
        name:'product-edit',
        component: productEdit
    },
    {
        path:'/product/view',
        name:'product-view',
        component: productView
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