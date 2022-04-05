import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './components/pages/HomePage.vue';
import PostShow from './components/pages/PostShow.vue';
import Contacts from './components/pages/Contacts.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';

const router = new VueRouter({
   mode: 'history',
   linkExactActiveClass: 'active',
   routes: [
      { path: '/', component: HomePage, name: 'home'},
      { path: '/posts/:slug', component: PostShow, name: 'post-details'},
      { path: '/contacts', component: Contacts, name: 'contacts'},
      { path: '*', component: NotFoundPage, name: 'not-found'},
   ]
})

export default router;