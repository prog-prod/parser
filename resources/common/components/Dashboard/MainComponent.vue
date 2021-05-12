<template>
    <div class="dashboard">
        <div id="layout-wrapper">
            <app-header></app-header>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="dashboard">
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
