<template>
    <main-component>
        <Breadcrumbs>Details of Stock #{{ stock.id }}</Breadcrumbs>
        <div slot="content" class="dashboard">
            <DetailsCard :stock="stock"/>
            <TabsCard :stock="stock"/>
        </div>
    </main-component>
</template>

<script>
import StockService from '../../../shared/services/stock.service';
import TabsCard from "./components/TabsCard";
import Breadcrumbs from "../../common/Breadcrumbs";
import DetailsCard from "./components/DetailsCard";

export default {
    components: {DetailsCard, Breadcrumbs, TabsCard},
    data() {
        return {
            stock: {}
        }
    },
    created() {
        return this.loadStock()
    },
    methods: {
        loadStock: function() {
            StockService.show(this.$route.params.id).then((response) => {
                this.stock = response.stock;
            })
        },

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
