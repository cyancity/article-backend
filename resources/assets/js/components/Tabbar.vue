<template>
  <div>
    <ul class="nav nav-pills" style="width: 100%">
      <li v-for="(item,index) in tabItems" :key="index">
        <router-link :to="'/' + item.id">
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
