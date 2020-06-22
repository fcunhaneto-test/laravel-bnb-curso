require('./bootstrap');

window.Vue = require('vue');

import router from "./routes";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import Index from "./Index";

import moment from 'moment'
Vue.filter('fromNow', value => {
    return moment(value).fromNow()
})

import StarRating from "./shared/components/StarRating";

const app = new Vue({
    el: '#app',
    router,
    components: {
        'index': Index,
        'star-rating': StarRating
    }
});
