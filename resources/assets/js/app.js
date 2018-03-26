window.Vue = require('vue');

require('./bootstrap');
require('./main.js');
require('./route.js');


// фильтры
// Vue.filter('lowercase', function(value) {
//     return value.toLowerCase()
// });

// импорт компонентов
// import Articles from './components/ArticleComponent.vue'
import Start from './components/StartComponent.vue'
import Navbar from './components/NavbarComponent.vue'
import Citate from './components/CitateComponent.vue'


// Vue.component('app-articles', Articles);
Vue.component('app-start', Start);
Vue.component('app-navbar', Navbar);
Vue.component('app-citate', Citate);

// логика
const app = new Vue({
    el: '#app',
    data : {
        title : 'Какойто текст2',
        message : 'example message',
        inputtext : '',
        style : '',
        value : '',
        cars : [
            { model : 'bmw', speed : 300 },
            { model : 'mazda', speed : 350 },
        ],
        ajaxToken : ''
    },
    methods : {
        increment (value) {
            this.value = value;
        },
        vote (id, team) {

            var refname = team + "_" + id

            // берем текущее кол-во голосов
            var votecount = this.$refs[refname].innerText;
            // преобразуем строку в число
            var votecount = Number(votecount)
            // прибавляем +1 голос
            votecount ++

            // меняем кол-во голосов в dom
            this.$refs[refname].innerText = votecount


            setTimeout(function(){
                // отправляем ajax запрос на сервер чтобы обновить кол-во голосов
                axios.get(Route.vote, {
                    params: {
                        id: id,
                        team : team
                    }
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }, 1000);



        }
    },
    computed : {
        doublevalue () {
            return this.value * 2;
        }
    },
    filters : {
        uppercase (value) {
            return value.toUpperCase()
        }
    }

});
