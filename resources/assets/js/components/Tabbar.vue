<template>
  <div>
    <ul class="list-inline">
      <ul class="nav nav-tabs">
        <li class="active" v-for="(item,index) in tabItems" :key="index">
          <router-link :to="'/' + item.id">
            {{item.title}}
          </router-link>
        </li>
      </ul>
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
    getItems () {
      axios.get('api/tab-items')
      .then((res) => {
          console.log(res)
          this.tabItems = res.data
      })
    }
  },
  created () {
    this.getItems()
  }
}
</script>

<style>

</style>
