
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import ClassicEditor from "@ckeditor/ckeditor5-build-classic/build/ckeditor.js";
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // data: {
    //     editor: ClassicEditor,
    //     editorData: "hola",
    //     editorConfig: {
    //         toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
    //         heading: {
    //             options: [
    //                 { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
    //                 { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
    //                 { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
    //                 { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
    //                 { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
    //                 { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' }
    //             ]
    //         }        }
    // }
});
