import {mapGetters} from "vuex";

export default {
    computed:{
        ...mapGetters(['showRightSidebarOnRoutes','STOCK_UPDATED_COLUMNS']),
        isVisibleRightSidebar(){
            return this.showRightSidebarOnRoutes.includes(this.$route.name)
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
                if(disableStyles){
                    return this.STOCK_UPDATED_COLUMNS[column];
                }else{
                    return this.updatedColumnStyle(this.STOCK_UPDATED_COLUMNS[column]);
                }
            }

            return value
        }
    },

}
