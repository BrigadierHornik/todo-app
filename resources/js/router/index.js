import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path : '/',
        component : () => import('../Pages/Home.vue'),
    },
    {
        path : '/login',
        component : () => import('../Pages/Login.vue'),
    },
    {
        path : '/logout',
        component : () => import('../Pages/Logout.vue'),
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
