Vue.component('cart-index', {
    data() {
        return {
            route: 'cart',
            name: '',
            email: '',
            phone: '',
            note: '',
            totalPrice: 0,
            subtotal: 0,
            discount: 0,
            coupon: '',
            address: '',
            cart: [],
            form: {
                validation: null,
                disabledButton: false,
                loadingDisplay: false,
            },
            lang: LANG,
        }
    },
    props: {},
    mounted() {
        this.getCart();
    },
    watch: {},
    methods: {
        increment(index) {
            this.cart[index].qty = this.cart[index].qty + 1;
            this.cart[index].subtotal = this.cart[index].qty * this.cart[index].price;
            localStorage.setItem("storedData", JSON.stringify(this.cart));
            this.getCart();
        },
        decrement(index) {
            if (this.cart[index].qty > 1) {
                this.cart[index].qty = this.cart[index].qty - 1;
                this.cart[index].subtotal = this.cart[index].qty * this.cart[index].price;
                localStorage.setItem("storedData", JSON.stringify(this.cart));
                this.getCart();
            }
        },
        getCart() {
            if (localStorage.getItem("storedData") != null) {
                this.cart = JSON.parse(localStorage.getItem("storedData"));
                let subTotal = 0;
                for (let i = 0; i < this.cart.length; i++) {
                    subTotal = parseInt(subTotal) + parseInt(this.cart[i].price) * parseInt(this.cart[i].qty);
                }
                this.subtotal = subTotal;
                this.totalPrice = this.subtotal;

                if (this.discount > 0) {
                    this.totalPrice = this.totalPrice - ((this.discount * this.totalPrice) / 100);
                }
            }
        },
        submitCheckOut() {

        },
        calcTotal(index) {
            this.subtotal = this.subtotal - this.cart[index]['subtotal'];
            this.totalPrice = this.subtotal;
        },
        deleteProduct(index) {
            this.calcTotal(index);
            this.cart.splice(index, 1);
            localStorage.setItem("storedData", JSON.stringify(this.cart));
        },
        checkout() {
            $('#paymentModal').modal('show');
        },
        applyCoupon() {
            this.form.disabledButton = true;
            axios.post(BASE_URL + '/' + this.route + '/apply-coupon', {
                code: this.coupon
            }).then(response => {
                Vue.$toast.success(response.data.message, 4000);
                this.discount = response.data.data;
                this.form.disabledButton = false;
                this.getCart();
            }).catch(error => {
                this.form.disabledButton = false;
                this.form.validation = error.response.data.errors;
                Vue.$toast.error(error.response.data.message, 4000);
            });
        }
    }
});
