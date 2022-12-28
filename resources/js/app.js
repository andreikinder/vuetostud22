require('./bootstrap')
//require('./routes')

// import VModal from 'vue-js-modal'


import { vfmPlugin } from 'vue-final-modal'


import router from './routes';

import PortalVue  from  "portal-vue";

import { createApp } from 'vue';

const app = createApp({})
app.use(router)

app.use(PortalVue)

app.use(vfmPlugin)

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

app.use(VueSweetalert2);
// app.use(VModal)
app.mount('#app')

