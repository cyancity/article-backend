<template>
  <div>
    <ul class="nav nav-pills" >
      <li v-for="(item,index) in tabItems" :key="index" style="margin: 0 auto;">
        <router-link :to="'/' + item.id">
          <i class="icon iconfont">&#xe621; {{item.icon}}</i>
          {{item.title}}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data () {
    return {
      tabItems: []
    }
  },
  methods: {
    getItems (id) {
      axios.get('api/tab-items', {
          params: {
              id: id
          }
      })
      .then((res) => {
          this.tabItems = res.data
      })
    }
  },
  created () {
    this.getItems(this.$route.params.id)
  }
}
</script>

<style>

</style>
