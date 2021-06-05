<template>
    <main-component>
        <Breadcrumbs slot="breadcrumb-name">Details of Stock #{{ INITIAL_STOCK.id }}</Breadcrumbs>
        <div slot="content" class="dashboard">
            <DetailsCard/>
            <TabsCard/>
        </div>
    </main-component>
</template>

<script>
import TabsCard from "./components/TabsCard";
import Breadcrumbs from "../../common/Breadcrumbs";
import DetailsCard from "./components/DetailsCard";
import {mapActions, mapGetters} from "vuex";

export default {
    components: {DetailsCard, Breadcrumbs, TabsCard},
    computed:{
      ...mapGetters(['INITIAL_STOCK'])
    },
    async created() {
        await this.$store.dispatch('GET_STOCK_UPDATED_COLUMNS',{ stock_id: this.$route.params.id })
        return this.loadStock()
    },
    methods: {
        ...mapActions(['VIEW_STOCK_UPDATES']),
        loadStock: function() {
           this.$store.dispatch('LOAD_STOCK',this.$route.params.id);
        },

    },
    mounted() {
        this.$store.commit('SET_STOCK_ID_HISTORY',this.$route.params.id)
        this.VIEW_STOCK_UPDATES(this.$route.params.id)
    }
}
</script>


<style>
    .tab-pane .item .value {
        font-size: 18px;
        color: #333;
        border-bottom: 1px solid #d4d4d4;
    }
    .share-structure span {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
        border-bottom: 1px solid #f2f2f2;
        padding-bottom: 5px;
    }
    .share-structure span.helper span {
        padding-left: 15px;
        font-size: 15px;
        color: #808080;
        border-bottom: unset;
    }
    table thead th {
        font-size: 14px;
        color: #333;
        margin-bottom: 10px;
        border-bottom: 1px solid #f2f2f2;
        padding-bottom: 5px;
    }
    table tbody td {
        padding: 15px 10px;
        border-bottom: 1px solid #f2f2f2;
    }
    ul {
        list-style-type: none;
        padding-left: 0;
        font-size: 16px;
    }
    .index {
        padding: 10px;
        border: 2px solid #4ebf32;
        font-weight: 500;
    }
    .index.not {
        border: 2px solid #f46a69;
    }
</style>
