<script>
    import Component from 'vue-class-component'

    @Component({
        template: `
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
        `
    })
    export default class Logout {
        created() {
            // - Clean Token From user Local Storage
            localStorage.removeItem('token');

            // - Clean Data From App Sate
            this.$store.state.authorized = false;
            this.$store.state.token = null;
            this.$store.state.user = {};

            // - Notify the API
            this.$http.get(this.$store.state.config.api_url + 'logout');

            setTimeout(() => {
                this.$router.push({name: 'auth.login'});
            }, 500);

        }
    }
</script>
