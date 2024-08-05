import { inject } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from '../App.vue';

const routes = [
    {
        path : '/',
        component : () => import('../Pages/Home.vue'),
    },
    {
        path : '/todo',
        component : () => import('../Pages/Todo.vue'),
        meta: { requiresAuth: true },
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

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        const auth = document.querySelector('meta[name="logged-in"]').content;
        if (auth) {
            return next();
        }
        next('/');
        return window.location.href = '/login';
    }
    next();
});

export default router;
