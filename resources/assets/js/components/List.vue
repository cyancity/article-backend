<template>
  <div>
    <ul class="list-group">
      <li class="list-group-item" v-for="(content, index) in data.data" :key="index" style="display: block">
        <a :href="'/news/show/' + content.id" style="display: inline-block;width: inherit">
          {{ content.title }}
        </a>
        <span class="pull-right" style="margin-left: 5px;display: inline-block">
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
    '$route': 'getContents'
  },
  methods: {
    // 根据分类 id获取该分类的分页数据
    getResults (page=1) {
      var id = this.$route.params.id
      axios.get('api/pagination', {
        params: {
            id: id,
            page: page
        }
      })
      .then((res) => {
        this.data = res.data
      })
    }
  }
}
</script>

<style>
  
</style>
