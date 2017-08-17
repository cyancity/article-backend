<template>
    <div class="sidebar">
          <ul class="nav">
              <li class="has-sub">
                  <a href="javascript:void(0);"><span>新闻分类</span><i class="fa fa-caret-right fa-fw pull-right"></i></a>
                  <ul class="sub-menu" v-for="(item, index) in tabItems" :key="index">
                      <li><a href="#"><i class="fa fa-circle-o fa-fw"></i>{{item.category}}</a></li>
                  </ul>
              </li>
          </ul>
    </div>
</template>

<script>
export default {
  data () {
    return {
      tabItems: {},
    }
  },
  methods: {
    getItems () {
      axios.get('api/items')
      .then((res) => {
        this.tabItems = res.data.category
      })
    }
    // pushItems ($items) {
    //   $items.forEach(function(element,index) {
    //     this.items.push($items[index])
    //   }, this);
    // } 
  },
  created () {
    this.getItems()
  }
}
</script>

<style>
  
</style>
