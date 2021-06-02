<template>
    <div class="vertical-menu-block">
        <button @click="collapseRightSidebar" type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>


        <div v-show="showRightSidebar" class="vertical-menu vertical-menu-right mm-active">
        <div  data-simplebar="init" class="sidebar-menu-scroll mm-show">
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
                                        <li class="menu-title">Stock History</li>

                                        <li class="mm-active">
                                            <router-link  class="dropdown-item" :to="{name: 'dashboard.stocks.show', params: {id: 2}}">
                                                • <span>{{ '12.23.2456' }}</span>
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
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "RightSidebar",
        computed:{
          ...mapGetters(['showRightSidebar'])
        },
        methods:{
            collapseRightSidebar(){
                this.$store.commit('change_show_right_sidebar', !this.showRightSidebar)
            }
        }
    }
</script>

<style>
    #page-topbar{
        right: 70px;
    }
    .vertical-menu-block{
        width: 70px;
        height: 70px;
        z-index: 1005;
        bottom: 0;
        right: 0;
        margin-top: 0;
        position: fixed;
        background-color: #fff;
        top: 0;
        box-shadow: 3px 2px 4px rgba(15,34, 58, .12);
    }
    .vertical-menu-right{
        /*margin-left: 250px;*/
        right: 0;
    }
    .vertical-menu-btn{
        z-index: 9999;
    }

</style>
