import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("../pages/HomePage.vue"),
    },
    {
        path: "/about",
        component: () => import("../pages/AboutPage.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
