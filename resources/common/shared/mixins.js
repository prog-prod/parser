import {mapGetters} from "vuex";

export default {
    computed:{
        ...mapGetters(['showRightSidebarOnRoutes']),
        isVisibleRightSidebar(){
            return this.showRightSidebarOnRoutes.includes(this.$route.name)
        }
    }
}
