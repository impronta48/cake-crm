import VueRouter from 'vue-router';
import PersoneIndex from './views/Persone/PersoneIndex.vue';
import PersoneEdit from './views/Persone/PersoneEdit.vue';
import PageNotFound from './views/PageNotFound.vue';

export const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/persone',
            name: 'root',
            component: PersoneIndex
        },        {
            path: '/persone/edit/:id',
            name: 'root',
            component: PersoneEdit
        },
        {
            path: "*",
            component: PageNotFound
        }
    ],
});