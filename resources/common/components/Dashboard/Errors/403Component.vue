<template>
    <div class="my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <div class="error-img">
                                        <img src="/assets/images/404-error.png" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-uppercase mt-4">Unfortunately, you do not have access to view this page.</h4>
                        <p class="text-muted">Please try later.</p>
                        <div class="mt-5">
                            <router-link :to="{name: 'dashboard'}" class="btn btn-primary waves-effect waves-light">
                                Back to Dashboard
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created: function() {
        this.$preloader.hide();
    },
    beforeCreate: function () {
        this.$preloader.show();
        $('body').addClass('authentication-bg');
    },
    beforeRouteLeave: function (to, from, next) {
        $('body').removeClass('authentication-bg');
        next();
    }
}
</script>
