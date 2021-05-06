
// компонент
var tr_component = {
    data: function () {
        return {
            response: 0
        }
    },
    props: ['item'],
    template: '<tr>' +
        '<td>{{ item.name }}</td>' +
        '<td>{{ item.price }}</td>' +
        '<td>{{ item.bedrooms }}</td>' +
        '<td>{{ item.storeys }}</td>' +
        '<td>{{ item.bathrooms }}</td>' +
        '<td>{{ item.garages }}</td>' +
        '</tr>'
};

// vue.js элемент со свойствами и методами
var id_vue_page = new Vue({
    el: '#id-vue-page',
    data: {
        loading: false, // предзагрузка
        sh_result: false, // отображение результатов
        exist_result: true,
        sh_json: false,
        _token: '',
        name: '',
        price_min: '',
        pric_max: '',
        bedrooms: '',
        storeys: '',
        bathrooms: '',
        garages: '',
        response: ''
    },
    components: { // регистрация компонента
        // в данном случае - компонент не используется
        'tr-component': tr_component
    },
    methods: { // методы компонента
        sendForm: function(){
            // the loading begin
            this.loading = true;
            // send ajax
            axios.post('/api/search-ttable', {
                _token: this._token,
                name: this.name,
                price_min: this.price_min,
                price_max: this.price_max,
                bedrooms: this.bedrooms,
                storeys: this.storeys,
                bathrooms: this.bathrooms,
                garages: this.garages
            }).then(response => {
                //this.response = JSON.stringify(response.data.data, null, 2)
                this.loading = false,
                this.sh_result = true,
                this.exist_result = (response.data.data.length > 0 ? true : false),
                this.response = response.data.data
            }).catch(error => {
                this.loading = false,
                this.sh_result = false,
                this.exist_result = false
                // error
            });
            return false;
        }
    }
});