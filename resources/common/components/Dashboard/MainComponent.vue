<template>
    <div class="dashboard">
        <div id="layout-wrapper">
            <app-header></app-header>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="dashboard">
                            <div class="card">
                                <div class="card-header">
                                    <slot name="breadcrumb-name"></slot>
                                </div>
                            </div>
                            <div class="filters">
                                <slot name="filters"></slot>
                            </div>
                            <!-- content page -->
                            <slot name="content"></slot>
                            <!-- end content page -->
                        </div>
                    </div>
                </div>
            </div>
            <app-footer></app-footer>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'main-component',
        beforeCreate: function () {
        },
        computed: {

        }
    }
</script>

<style lang="scss">
    .right-sidebar-visible{
        .main-content{
            margin-right:250px !important
        }
    }
</style>
