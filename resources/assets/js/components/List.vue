<template>
  <div>
    <ul class="list-group">
      <li class="row list-group-item" v-for="(content, index) in data.data" :key="index" style="display: block;min-height: 42px">
        <a :href="'/news/show/' + content.id" class="col-xs-9">
          {{ content.title }}
        </a>
        <span class="col-xs-3 pull-right" style="padding: 0px;">
            {{content.created_at.substr(0,10)}}
          </span>

      </li>
    </ul>
    <pagination :data="data.pagination" @pagination-change-page="getResults" class="pull-right"></pagination>
  </div>
</template>

<script>
export default {
  data () {
    return {
      data: {},
      defaultPage: '0',
    }
  },
  mounted () {
    this.getResults()
  },
  watch: {
    '$route' (to, form) {
        this.getResults()
    }
  },
  methods: {
    // 根据分类 id获取该分类的分页数据
    getResults (page=0) {
      let id = this.$route.params.id
      axios.get('api/pagination', {
        params: {
            id: id,
            page: page
        }
      })
      .then((res) => {
        console.log(res.data)
        this.data = res.data
      })
    }
  }
}
</script>

<style>
  
</style>
