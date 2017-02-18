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
            full_name: '',
            email: '',
            subject: '',
            message: ''
        };

        mounted() {

        }

        getError(name) {
            return (this.form.errors && this.form.errors[name]) ? this.form.errors[name].toString() : false;
        }

    }
</script>
