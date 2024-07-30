import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path : '/',
        component : () => import('../Layouts/PageLayout.vue'),
    },
    {
        path : '/login',
        component : () => import('../Pages/Login.vue'),
    },
    {
        path : '/:pathMatch(.*)*',
        component : () => import('../Pages/NotFound.vue'),
    }
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});


export default router;
