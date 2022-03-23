<template>
    <div class="cartProducts">
        <div class="head d-flex justify-content-start">
            <a href="#" class="closeCart"> <i class=" fal fa-chevron-left "></i> </a>
            <h1> Products in Cart </h1>
        </div>
        <div class="scrollresult">
            <div class="boxCart d-flex justify-content-start" v-for="(row, index) in cart" :key="index">
                <div class="imgPrd">
                    <img :src="row.img">
                </div>
                <div class="brife">
                    <h3>{{row.productName}}</h3>
                    <h2>${{ row.price }}</h2>
                </div>
            </div>
        </div>
        <a :href="routeCart" class="btn btn-defualt "> Go To Cart</a>
    </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
    data() {
        return {
        }
    },
    props:{
        routeCart:null,
    },
    watch:{

    },
    computed: {
        ...mapState(['cart'])
    },
    mounted() {
        this.$store.dispatch('getCart')

        //this.getCart();
    },
    methods: {
        // getCart() {
        //     if (localStorage.getItem("storedData") != null) {
        //         this.cart = JSON.parse(localStorage.getItem("storedData"));
        //         let subTotal = 0;
        //         for (let i = 0; i < this.cart.length; i++) {
        //             subTotal = parseInt(subTotal) + parseInt(this.cart[i].price) * parseInt(this.cart[i].qty);
        //         }
        //         this.subtotal = subTotal;
        //         this.totalPrice = this.subtotal;
        //
        //         if (this.discount > 0) {
        //             this.totalPrice = this.totalPrice - ((this.discount * this.totalPrice) / 100);
        //         }
        //     }
        // },
    }
}
</script>

<style scoped>

</style>
