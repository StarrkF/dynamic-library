import { createRouter, createWebHistory  } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../pages/Home.vue')
        },
        {
            path: '/books/:id?',
            name: 'books',
            component: () => import('../pages/Books.vue')
        },
        {
            path: '/types',
            name: 'types',
            component: () => import('../pages/Types.vue')
        },
    ]
})

export default router
