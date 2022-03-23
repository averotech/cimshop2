require('./bootstrap');
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import Paginate from 'vuejs-paginate'

import store from './store/store';


import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from "element-ui/lib/locale/lang/en";
Vue.use(ElementUI, {locale});

Vue.use(VueToast);
Vue.component('mailing-list-component', require('./site/components/MailingListComponent').default);
Vue.component('search-product-modal-component', require('./site/components/SearchProductModalComponent').default);
Vue.component('cart-component', require('./site/components/CartComponent').default);
Vue.component('paginate', Paginate)

require('./site/contact-us/form');
require('./site/shop/prodicts-show');
require('./site/product/detiles');
require('./site/cart/index');



const app = new Vue({
    el: '#app',
    store: store,
});
