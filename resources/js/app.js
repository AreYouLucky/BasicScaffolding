//require('./bootstrap');

window.Vue = require('vue').default;
window.axios = require('axios');


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.filter('formatTime', function(value) {
    var timeString = value;
    var H = +timeString.substr(0, 2);
    var h = (H % 12) || 12;
    var ampm = H < 12 ? " AM" : " PM";
    timeString = h + timeString.substr(2, 3) + ampm;
    return timeString;
});


Vue.filter('formatDateTime', function(value) {
    let ndate = new Date(value);

    var timeString = ndate.toTimeString();
    var H = +timeString.substr(0, 2);
    var h = (H % 12) || 12;
    var ampm = H < 12 ? " AM" : " PM";
    timeString = h + timeString.substr(2, 3) + ampm;
    return ndate.toDateString()+ ', Time: ' + timeString;
});



const app = new Vue({
    el: '#app',
});
