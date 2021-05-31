<template>
    <div>
        <h6>Filter Price</h6>
        <div class="d-flex">
            <div class="d-flex me-3">
                <label for="filter-price-min" class="col-form-label me-1">Min</label>
                <input class="form-control" type="number" @change="filterPrice('min')" v-model="price.min"
                       id="filter-price-min">
            </div>
            <div class="d-flex">
                <label for="filter-price-max" class="col-form-label me-1">Max</label>
                <input class="form-control" type="number" @change="filterPrice('max')" v-model="price.max"
                       id="filter-price-max">
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "FilterPrice",
        data: function () {
            return {
                price: {
                    min: null,
                    max: null,
                },
            }
        },
        computed:{
            ...mapGetters(['user']),
            stock_filter(){
                return this.user.stock_filter;
            }
        },
        methods: {
            filterPrice(type) {
                this.$emit(`${type}-price`, this.price[type])
            }
        },
        async mounted() {
            await this.$store.dispatch('updateUserData');
            this.price.min = this.stock_filter.min_price
            this.price.max = this.stock_filter.max_price

        }
    }
</script>
