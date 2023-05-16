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
            path: '/books/type/:type?',
            name: 'book-type',
            component: () => import('../pages/Books.vue')
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
        {
            path: '/chart',
            name: 'chart',
            component: () => import('../pages/Chart.vue')
        },
    ]
})

export default router
