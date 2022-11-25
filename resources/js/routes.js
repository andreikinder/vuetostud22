import * as VueRouter from 'vue-router';
import Home from './views/Home';
import About from './views/About';
import Contact from './views/Contact';

let routes = [
    {
        path 		: '/',
        component 	: Home,
    },
    {
        path 		: '/about',
        component 	: About,
    },
    {
        path 		: '/contacts',
        component 	: Contact,
    }
]
let router =   VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes: routes,
    linkActiveClass : 'is-active'
})

export default router;
