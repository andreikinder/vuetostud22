require('./bootstrap')
//require('./routes')

import router from './routes';

import { createApp } from 'vue';

const app = createApp({})
app.use(router)

app.mount('#app')

