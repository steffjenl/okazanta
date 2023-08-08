/**
 * Polyfill promises.
 */
const Promise = require('promise')

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-Token': window.Global.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Flatpickr.
 */
import Flatpickr from 'flatpickr'

((win, doc) => {
    /**
     * Next, we will create a fresh Vue application instance and attach it to
     * the page. Then, you may begin adding components to this application
     * or customize the JavaScript scaffolding to fit your unique needs.
     */

    Vue.component('fetch-data', require('./components/FetchData').default);

    new Vue({
        el: '#app',
        data () {
            return {
                // TODO: Fill this with the active user.
                user: null,
                messages: [
                    //
                ],
                system: {
                    updateAvailable: false,
                }
            }
        },
        mounted () {
            Flatpickr('.flatpickr');

            Flatpickr('.flatpickr-time', {
                enableTime: true
            });
        },
        components: {
            'setup': require('./components/Setup').default,
            'dashboard': require('./components/dashboard/Dashboard').default,
            'metric-chart': require('./components/status-page/Metric').default,
        }
    });
})();

$(function () {
    window.generateWebhookToken = function ()  {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < 32) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
        }

        $('#componentWebhookToken').val(result);
    }
});
