<template>
    <div>
<!--   TODO : you should add styles to this page too     -->
        <form @submit.prevent="doLogin">
            <div class="mb-3">
                <label class="form-label" for="email">E-mail</label>
                <input type="email" class="form-control" v-model="form.email" id="email" placeholder="Enter e-mail">
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" v-model="form.password" id="password" placeholder="Enter password">
            </div>

            <div class="form-check">
                <input type="checkbox" v-model="form.remember" class="form-check-input" id="auth-remember-check">
                <label class="form-check-label" for="auth-remember-check">Remember me</label>
            </div>

            <div class="mt-3 text-end">
                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
            </div>

            <div class="mt-4 text-center">
                <p class="mb-0">
                    Don't have an account ?
                    <router-link :to="{name: 'auth.register'}" class="fw-medium text-primary">SignUp now</router-link>
                </p>
            </div>
        </form>
    </div>
</template>

<script>
    import AuthService from '../../shared/services/auth.service.js';

    export default {
        data: function () {
            return {
                form: {
                    email: '',
                    password: '',
                    remember: true
                }
            }
        },
        created: function() {

        },
        methods: {
            doLogin: function () {
                AuthService.login(this.form).then((response) => {
                    if (response.result === true) {
                        this.$store.dispatch("loginSuccess", response);
                        this.$router.push({ name: "dashboard"});
                        window.Vue.toasted.success(response.message);
                    }
                });
            }
        },
    }
</script>
