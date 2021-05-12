<template>
    <div>
        <div class="home-btn d-none d-sm-block">
            <a href="#" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="#" class="mb-5 d-block auth-logo">
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
                                    <h5 class="text-primary">Register Account</h5>
                                    <p class="text-muted">Get your free account now.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form @submit.prevent="doSignUp">

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" v-model="form.name" class="form-control" id="name" placeholder="Enter name">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" v-model="form.email" class="form-control" id="useremail" placeholder="Enter email">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" v-model="form.password" class="form-control" id="password" placeholder="Enter password">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="confirmation_password">Password</label>
                                            <input type="password" v-model="form.password_confirmation" class="form-control" id="confirmation_password" placeholder="Repeat password">
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" v-model="form.terms" class="form-check-input" id="auth-terms-condition-check">
                                            <label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Register</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">
                                                Already have an account?
                                                <router-link :to="{name: 'auth.login'}" class="fw-medium text-primary">Login</router-link>
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
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: true
            }
        }
    },
    methods: {
        doSignUp: function () {
            AuthService.register(this.form).then((response) => {
                if (response.result === true) {
                    this.$store.dispatch("loginSuccess", response);
                    this.$router.push({ name: "dashboard"});
                    window.Vue.toasted.success(response.message);
                }
            });
        }
    },
    created: function() {
        $('body').addClass('authentication-bg');
    },
    beforeRouteLeave: function (to, from, next) {
        $('body').removeClass('authentication-bg');
        next();
    }
}
</script>
