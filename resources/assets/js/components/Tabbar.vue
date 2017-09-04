<template>
  <div>
    <ul class="row nav nav-pills" >
      <li v-for="(item,index) in tabItems" :key="index">
        <router-link :to="'/' + item.id" class="col-xs-4">
          <i class="icon iconfont" :class="item.icon"></i>
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
      tabItems: [],
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
