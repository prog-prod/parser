<template>
    <div class="tab-pane" id="news" role="tabpanel">
        <h3>
            OTC DISCLOSURE & NEWS SERVICE
        </h3>
        <hr>
        <a target="_blank" :href="getLink(item)" class="d-block mb-1" v-for="item in STOCK.news" v-html="item.title"></a>
    </div>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "NewsTab",
      data: () => ({
          base_link: 'https://www.otcmarkets.com/stock/',
      }),
      computed:{
        ...mapGetters(['STOCK'])
      },
      methods:{
        getLink(item){
           return this.base_link +
               this.STOCK.symbol + '/news/' +
               item.title.replaceAll(' ', '-').replaceAll('.', '').replaceAll('/', '').substr(0, 122) +
               '?id=' + item.original_id

            'https://www.otcmarkets.com/stock/TDLAF/news/PGLA---announced-a-rights-dividend-of-One-non-transferable-right-for-every-1-share-held-Record-date-4/26/2013-PGLA-will-not-be-quoted-ex?id=62577'
            'https://www.otcmarkets.com/stock/TDLAF/news/PGLA---announced-a-rights-dividend-of-One-non-transferable-right-for-every-1-share-held-Record-date-4262013-PGLA-will-no?id=62577'
        }
      }
  }
</script>

<style scoped>

</style>
