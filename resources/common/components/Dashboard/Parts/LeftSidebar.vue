<template>
    <div class="vertical-menu mm-active">

        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="javascript:void(0);" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                <span class="logo-lg">
                            <img src="/assets/images/logo-dark.png" alt="" height="20">
                        </span>
            </a>

            <a href="javascript:void(0);" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                <span class="logo-lg">
                            <img src="/assets/images/logo-light.png" alt="" height="20">
                        </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div data-simplebar="init" class="sidebar-menu-scroll mm-show">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: -20px; bottom: 0px;">
                        <div class="simplebar-content-wrapper"
                             style="height: 100%; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">

                                <!--- Sidemenu -->
                                <div id="sidebar-menu" class="mm-active">
                                    <!-- Left Menu Start -->
                                    <ul class="metismenu list-unstyled mm-show" id="side-menu">
                                        <li class="menu-title">Menu</li>

                                        <li class="mm-active">

                                            <router-link :to="{name: 'dashboard'}" class="dropdown-item">
                                                <i class="uil-home-alt"></i>
                                                <span>Dashboard</span>
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 937px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar"
                     style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                     style="height: 227px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LeftSidebar"
    }
</script>

<style scoped>

</style>
