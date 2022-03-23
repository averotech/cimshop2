export default {
    getCart(context) {
        if (localStorage.getItem("storedData") != null) {
            context.commit('SET_CART', JSON.parse(localStorage.getItem("storedData")))
        }
    },
    getCountItemCart(context) {
        // context.commit('SET_COUNT_ITEM_CART', this.$store.state.cart.length)
    },
}
