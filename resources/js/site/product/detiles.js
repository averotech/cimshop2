Vue.component('product-detilas', {
    data() {
        return {
            route: 'cart',
            color: null,
            qty: 1,
            cart: [],
            lang: LANG,
            subtotal:0,
            form: {
                validation: null,
                disabledButton: false,
                loadingDisplay: false,
            }
        }
    },
    props: {
        product: null,
    },
    mounted() {
        if (localStorage.getItem("storedData") != null) {
            this.cart = JSON.parse(localStorage.getItem("storedData"));
        }
    },
    computed:{
        // subtotal:function ()   {
        //     let total;
        //     $.each(this.cart, (index,item) => {
        //         total.push(item.price * item.qty)
        //     })
        //
        //     return _.sum(total);
        // }
    },
    methods: {
        minusQty(){
            if (this.qty !== 1)
                --this.qty;
        },
        plusQty(){
            ++this.qty;
        },
        addToCart() {
            this.cart.push({
                img: this.product.images[0].img_url,
                productName: this.product.show_name,
                id: this.product.id,
                price: this.product.price,
                color: this.color,
                qty: this.qty,
                subtotal:  this.product.price * this.qty,
            });

            localStorage.setItem(
                "storedData",
                JSON.stringify(this.cart)
            );

            for (let i = 0; i < this.cart.length; i++) {
                this.subtotal = this.subtotal + parseInt(this.cart[i].price) * parseInt(this.cart[i].qty);
            }
            this.$store.dispatch('getCart')

            this.openCart();
        },
        openCart() {
            $(".overlay").show();
            $(".cartProducts").addClass("slideCartProducts");
        },
        resetColor() {
            $('.inactive').removeClass('color-active');
            this.color = null;
        },
        changeColor(color) {
            $('.inactive').removeClass('color-active');
            $('#color_' + color.id).addClass('color-active');
            this.color = color.color;
        },
        buyNow() {

        }

    }
});


