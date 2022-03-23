export default {
    SET_CART(state, data) {
        state.cart = data;
    },
    SET_COUNT_ITEM_CART(state, data) {
        state.count_item_cart = data;
    },
    SET_COUNT_ITEM_FAVORITES(state, data) {
        state.count_item_favorites = data;
    },
}
