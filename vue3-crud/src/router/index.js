//import vue router
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    
    {
        path: '/posts',
        name: 'posts.index',
        component: () => import( /* webpackChunkName: "index" */ '../views/posts/index.vue')
    },
    {
        path: '/vue/create',
        name: 'posts.create',
        component: () => import( /* webpackChunkName: "create" */ '../views/posts/create.vue')
    },
    {
        path: '/vue/edit/:id',
        name: 'posts.edit',
        component: () => import( /* webpackChunkName: "edit" */ '../views/posts/edit.vue')
    },
    {
        path: '/',
        name: 'guru.index',
        component: () => import( /* webpackChunkName: "edit" */ '../views/guru/index.vue')
    },
    {
        path: '/create',
        name: 'guru.create',
        component: () => import( /* webpackChunkName: "edit" */ '../views/guru/create.vue')
    },
    {
        path: '/edit/:id',
        name: 'guru.edit',
        component:() => import( /* webpackChunkName: "edit" */ '../views/guru/edit.vue')
    }
]
//create router
const router = createRouter({
    history: createWebHistory(),
    routes // <-- routes,
})

export default router
