Vue.component('contact-us-form', {
    data() {
        return {
            route: 'contact-us',
            name: '',
            subject: '',
            message: '',
            email: '',
            recaptcha: null,
            form: {
                validation: null,
                disabledButton: false,
                loadingDisplay: false,
            }
        }
    },
    props: {
        user: null,
        profile: null,
    },
    mounted() {
    },
    methods: {
        sendMessage() {
            this.form.disabledButton = true;
            this.form.loadingDisplay = true;
            this.form.validation = null;
            axios.post(BASE_URL + '/' + this.route + '/store', {
                name: this.name,
                subject: this.subject,
                message: this.message,
                email: this.email,
            }).then(response => {
                Vue.$toast.success(response.data.message, 4000);
                this.reset();
            }).catch(error => {
                this.form.disabledButton = false;
                this.form.loadingDisplay = false;
                this.form.validation = error.response.data.errors;
            })
        },
        reset() {
            this.form.disabledButton = false;
            this.form.loadingDisplay = false;
            this.form.validation = null;
            this.name = null;
            this.subject = null;
            this.message = null;
            this.email = null;
        }
    }
});


