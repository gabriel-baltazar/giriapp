import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import GiriaDetalhes from "@/views/GiriaDetalhes.vue";
import About from "@/views/About.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/giria/:id",
    name: "GiriaDetalhes",
    props: true,
    component: GiriaDetalhes,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
