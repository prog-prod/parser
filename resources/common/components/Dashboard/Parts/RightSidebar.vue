<template>
    <div class="vertical-menu-block">
        <button @click="collapseRightSidebar" type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <history-icon/>
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

                                        <li :class="{'mm-active': STOCK_HISTORY_ID === history.id}" class="cursor-pointer" v-for="history in histories">
                                            <a @click.prevent="showHistory(history.id)"  class="dropdown-item" >
                                                • <span>{{ history.created_at }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="text-center text-muted" v-if="histories.length === 0"><span>History is empty</span></div>
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
    import HistoryIcon from "../../common/icons/HistoryIcon";
    import StockService from "../../../shared/services/stock.service";

    export default {
        name: "RightSidebar",
        components: {HistoryIcon},
        data:() => ({
            histories: []
        }),
        computed:{
          ...mapGetters(['showRightSidebar', 'stockIdHistory', 'STOCK_HISTORY_ID'])
        },
        methods:{
            async showHistory(history_id){
                await this.$store.commit('SET_STOCK_HISTORY_ID',history_id);
                console.log(this.STOCK_HISTORY_ID)
            },
            collapseRightSidebar(){
                this.$store.commit('change_show_right_sidebar', !this.showRightSidebar)
            },
            async getStockHistory(stock_id){
                const h = await StockService.getHistory(stock_id);
                this.histories = h.history;
            }
        },
        async created() {
            if(this.stockIdHistory){
                await this.getStockHistory(this.stockIdHistory);
            }

        }

    }
</script>

<style>
    .cursor-pointer{
        cursor: pointer;
    }
    #page-topbar.added-menu-right{
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
