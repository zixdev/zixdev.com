<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component'

    @Component
    export default class ContactUs extends Vue {
        form = {
            submitting: false,
            submitted: false,
            successful: false,
            errors: {}
        };
        contact = {
            form_name: 'contact-us',
            name: '',
            email: '',
            subject: '',
            message: ''
        };

        mounted() {

        }

        getError(name) {
            return (this.form.errors && this.form.errors[name]) ? this.form.errors[name].toString() : false;
        }
        send() {
            this.form.submitting = true;
            this.$http.post('/forms/contact-us', this.contact)
                    .then(response => {
                        console.info(response)
                        this.form.submitted = true;
                        this.form.errors = {
                            success: true
                        }
                    })
                    .catch(error => {
                        this.form.errors = error.data;
                        this.form.submitting = false;
                        if (error.status == 0) {
                            this.form.errors = {
                                message: 'Oops Couldn\'t connect to the server, please check your network.'
                            }
                        }
                    })
        }
    }
</script>
