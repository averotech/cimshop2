<template>
    <div class="modal fade" id="searchModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <form action="shop" style="display: flex; flex-direction: column">
                        <label for="name">{{title}}</label>
                        <input type="search" id="name" name="text-search" required />
                        <button type="submit" class="btn btn-final mt-3 w-100">{{button}}</button>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props:{
        title:'',
        button:'',
    },
    mounted() {
    },
    methods: {
    }
}
</script>

<style scoped>

</style>
