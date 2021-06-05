import {mapGetters} from "vuex";

export default {
    computed:{
        ...mapGetters([
            'showRightSidebarOnRoutes',
            'STOCK_UPDATED_COLUMNS',
            'STOCK_HISTORY_DATE',
            'INITIAL_STOCK'
        ]),
        isVisibleRightSidebar(){
            return this.showRightSidebarOnRoutes.includes(this.$route.name)
        },
        initialStockDate(){
            return this.INITIAL_STOCK.created_at ? this.INITIAL_STOCK.created_at.split(' ')[0] : '';
        },
        INITIAL_STOCK_ACTIVE(){
            return this.STOCK_HISTORY_DATE === this.initialStockDate || this.STOCK_HISTORY_DATE == null
        }
    },
    methods:{
        updatedColumnStyle(column) {
          return `<span class="updated-column">${column}</span>`;
        },
        listen(column, value = null, disableStyles = false){

            if(value === null){
                return true;
            }

            if(this.STOCK_UPDATED_COLUMNS && Object.keys(this.STOCK_UPDATED_COLUMNS).includes(column)){
                if(disableStyles || !this.INITIAL_STOCK_ACTIVE){
                    return this.STOCK_UPDATED_COLUMNS[column];
                }else{
                    return this.updatedColumnStyle(this.STOCK_UPDATED_COLUMNS[column]);
                }
            }

            return value
        }
    },

}
