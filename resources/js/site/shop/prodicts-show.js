Vue.component('products-search', {
    data() {
        return {
            route: 'products',
            products: [],
            filter: {
                text: '',
                category_id: null,
                price: [1, 100000],
            },
            lang: LANG,
            categories: [],
            sort: '',
            order_by: 'desc',
            limit: '9',
            page: {
                currentPage: 1,
                totalPages: 0,
                totalItems: 0,
                itemsPerPage: 10
            },
        }
    },
    props: {
        text: null,
    },
    mounted() {
        // $("#slider-range").slider({
        //     range: true,
        //     min: 1,
        //     max: 100000,
        //     values: [1, 100000],
        //     slide: (event, ui) => {
        //         $("#amount").val(ui.values[0] + "-" + ui.values[1]);
        //         this.filter.price = ui.values[0] + "-" + ui.values[1];
        //     }
        // });
        // $("#amount").val($("#slider-range").slider("values", 0) + $("#slider-range").slider("values", 1));

        this.fetchData();
    },
    watch: {
        // "filter.price": function (val) {
        //     this.fetchData();
        // }
    },
    methods: {
        fetchData() {
            if (this.text) {
                this.filter.text = this.text;
            }
            axios.get(BASE_URL + '/' + this.route + '/data', {
                params: {
                    page: this.page.currentPage,
                    filter: this.filter,
                    sort: this.sort,
                    order_by: this.order_by,
                    limit: this.limit
                }
            }).then(response => {

                this.products = response.data.data.data;
                this.page.totalPages = response.data.data.last_page;
                this.page.totalItems = response.data.data.total;
            }).catch(error => {
            });
        },
        onCategory(category) {
            this.filter.category_id = category;
            this.fetchData();
        },
        onPrice() {
            this.fetchData();
        },
        onSort() {
            this.fetchData();
        },
        nextPage(val) {
            this.page.currentPage = val;
            this.fetchData();
        },
        sortBy(event) {
            this.sort = event.target.value;
            this.fetchData();
        },
    }
});
