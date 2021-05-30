import Vue from 'vue';
import Toasted from 'vue-toasted';
import vSelect from 'vue-select'

Vue.use(Toasted, {duration: 5000});

Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';
