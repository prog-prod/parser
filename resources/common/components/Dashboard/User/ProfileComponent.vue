<template>
    <main-component>
        <h4 slot="breadcrumb-name" class="mb-0">Profile</h4>
        <div slot="content" class="dashboard">
            <!-- row -->
            <div class="row">
                <div class="col-4 col-xs-12">
                    <form @submit.prevent="updateProfile" autocomplete="off">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">General information</h4>
                                <div class="mb-3">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input class="form-control" type="text" v-model="user.name" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">E-mail</label>
                                    <input class="form-control" type="email" v-model="user.email" id="email">
                                </div>
                                <button type="submit" class="btn btn-primary w-md">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end col -->
                <div class="col-4 col-xs-12">
                    <form @submit.prevent="updateStockFilter" autocomplete="off" ref="password_form">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Stock Filter Information</h4>
                                <div class="mb-3">
                                    <label for="stock_filter.min_price" class="col-form-label">Show stocks with minimum price</label>
                                    <input class="form-control" type="text" v-model="stock_filter.min_price" id="stock_filter.min_price">
                                </div>
                                <div class="mb-3">
                                    <label for="stock_filter.max_price" class="col-form-label">Show stocks with maximum price</label>
                                    <input class="form-control" type="text" v-model="stock_filter.max_price" id="stock_filter.max_price">
                                </div>
                                <button type="submit" class="btn btn-primary w-md">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end col -->
                <div class="col-4 col-xs-12">
                    <form @submit.prevent="updatePassword" autocomplete="off" ref="password_form">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change password</h4>
                                <div class="mb-3">
                                    <label for="current_password" class="col-form-label">Current password</label>
                                    <input required="required" class="form-control" type="password" v-model="password.current_password" id="current_password">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">New password</label>
                                    <input required="required" class="form-control" type="password" v-model="password.password" id="password">
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="col-form-label">Confirm password</label>
                                    <input required="required" class="form-control" type="password" v-model="password.password_confirmation" id="password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-primary w-md">Save</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </main-component>
</template>

<script>
import UserService from '../../../shared/services/user.service';

export default {
    data: () => {
        return {
            user: {},
            password: {
                current_password: '',
                password: '',
                password_confirmation: ''
            },
            stock_filter: {
                min_price: null,
                max_price: null
            }
        }
    },
    mounted() {
        this.user = this.$store.getters.user;
        if (this.user.stock_filter !== null) {
            this.stock_filter = this.user.stock_filter;
        }
    },
    methods: {
        updateProfile: function() {
            UserService.updateProfile(this.user).then((response) => {
                this.$store.dispatch("updateUser", response.user);
                this.$toasted.success(response.message);
            });
        },
        updatePassword: function() {
            UserService.updatePassword(this.password).then((response) => {
                this.$toasted.success(response.message);
                this.$refs.password_form.reset();
            });
        },
        updateStockFilter: function() {
            UserService.updateStockFilter(this.stock_filter).then((response) => {
                this.$store.dispatch('updateStockFilterSettings', response.stock_filter);
                this.$toasted.success(response.message);
            });
        }
    }
}
</script>

<style>
form label {
    padding-left: 0px !important;
}
</style>
