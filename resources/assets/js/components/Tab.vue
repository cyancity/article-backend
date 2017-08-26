<template>
    <div>
        <ul class="list-inline">
          <ul class="nav nav-tabs">
              <li class="active" v-for="(item,index) in tabItems" :key="index">
              <a data-toggle="tab" href="" @click="getContents(item.category)">
                  {{item.category}}
              </a>
              </li>
          </ul>
        </ul>
    </div>
</template>

<script>
export default {
  data () {
    return {
      items: [],
      itemsCount: 1,
      defaultItem: '1',
      tabItems: {},
    }
  },
  created () {
    this.getItems()
  },
  methods: {
    getItems () {
      axios.get('api/items')
      .then((res) => {
        console.log(res)
        this.tabItems = res.data.category
      })
    }
  }
}
</script>

<style>
  
</style>
