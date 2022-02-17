<template>
    <div class="subscribe">
        <div class="title">Subscribe</div>
        <div class="input-group mb-3">
            <input type="text"  v-model="email"  class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn "  @click="save" :disabled="form.disabledButton"  type="button">Send</button>
            </div>
        </div>
        <span class="error" v-if="form.validation&&form.validation.email">{{ form.validation.email[0]}}</span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            route: 'mailing-list',
            email: '',
            form: {
                validation: null,
                disabledButton: false,
                loadingDisplay: false,
            },
        }
    },
    props:{
        title :'',
        placeholder :'',
        button :'',
    },
    mounted() {
    },
    methods: {
        save() {
            this.form.loadingDisplay = true;
            this.form.disabledButton = true;
            this.form.validation = null;
            axios.post( BASE_URL+'/' + this.route + '/store', {
                email: this.email,
            }).then(response => {
                Vue.$toast.success(response.data.message, 4000);
                this.reset();
            }).catch(error => {
                this.form.disabledButton = false;
                this.form.loadingDisplay = false;
                this.form.validation = error.response.data.errors;
            });
        },
        reset() {
            this.email = '';
            this.form.validation = null;
            this.form.disabledButton = false;
            this.form.loadingDisplay = false;
        }
    }
}
</script>
