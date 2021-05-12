<template>
    <div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="javascript:void(0);" class="mb-5 d-block auth-logo">
                                <img src="/assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="/assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue using the parser.</p>
                                </div>
                                <div class="p-2 mt-4">
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

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
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
            $('body').addClass('authentication-bg');
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
        beforeRouteLeave: function (to, from, next) {
            $('body').removeClass('authentication-bg');
            next();
        }
    }
</script>
