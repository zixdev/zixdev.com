<template lang="jade">


	.full-bg-img
		.container
			#loader-wrapper(v-if='form.submitting')
				#loader
			ul.list-unstyled(v-if='!form.submitted')
				li
					img.img-responsive.center-block(src='../../../../assets/logo.png', alt='Zix Development')
				li
					.middle-box.text-center.loginscreen
						.alert.alert-danger(v-if='form.errors && form.errors.message')
							| {{form.errors.message}}
						form(@submit.prevent='login()')
							.input-group.m-b
								span.input-group-addon
									i.fa.fa-user
								input.form-control(type='email', name='name', :placeholder="$t('auth.email')", v-model='user.email', required='')
							.input-group.m-b
								span.input-group-addon
									i.fa.fa-lock
								input.form-control(type='password', name='password', :placeholder="$t('auth.password')", v-model='user.password', required='')
							button.btn.btn-primary.block.full-width.m-b(type='submit')
								i.fa.fa-spinner.fa-pulse(v-if='form.submitting')
								| {{$t('auth.login')}}



</template>

<script>
import Component from 'vue-class-component'
import AppState from '../../../../store';
@Component
export default class Login {
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            form: {
                submitting: false,
                submitted: false,
                errors: {},
            }
        }
    }


    login() {
        this.form.submitting = true;
        this.$http.post(this.$store.state.config.api_url + 'login', this.user)
            .then(response => {
            	console.log(response.data.data)
                let res = response.data.data;
                if (res.permissions.includes('full_access') || res.permissions.includes('view_admin')) {
                    localStorage.setItem('token', res.token);
                    this.$store.state.token = res.token;
                    this.$store.state.auth = res.user;
                    this.$store.state.auth_permissions = res.permissions;
                    this.form.submitted = true;

                    this.$store.state.authorized = true;
                    this.$router.push({
                        name: 'dashboard'
                    });

                    return true;
                }
                this.form.errors = {
                    message: 'Oops Looks Like you don\'t have access to the admin panel'
                };
                this.form.submitting = false;
                return false;
            })
            .catch(error => {
                this.form.submitting = false;
                if (error.status == 0) {
                    return this.connectionError('Cannot connect the computer to the server.', this.login);
                } else {
                    return this.form.errors = error.data;
                }
            });
    }

    connectionError(message, callback) {
        let timeout = 60;
        var interval = setInterval(() => {
          this.form.errors = {
              message: message + ' \n will re-try in ' + timeout
          };

          if(timeout == 1) {
              clearInterval(interval);
              callback();
          }
          timeout--;
        }, 1000);


    }
}
</script>
<style lang="scss" scoped>
.full-bg-img {
    color: #FFFFFF;
    font-size: 16px;

    .form-control,
    .input-group-addon {
        background-color: transparent;
        &:focus {
            border-color: #a21d21 !important;
        }
    }

    .container {
        position: relative;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-primary {
        background-color: #a21d21;
        border-color: #a21d21;
        &:active,
        &:focus,
        &:hover {
            background-color: #db2c31;
            border-color: #db2c31;
        }
    }

    .alert-danger {
        background-color: transparent;
        border-color: #a21d21;
        border-radius: 0;
        color: #FFFFFF;

    }

    .list-unstyled {
        min-height: 420px;
    }
}
</style>
