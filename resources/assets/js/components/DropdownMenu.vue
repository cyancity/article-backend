<template>
  <div>
    <li class="dropdown">
      <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        父级分类1
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu" v-for="">
        <li>
          <a href="">子分类1</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="">子分类2</a>
        </li>
        <li class="divider"></li>
      </ul>
    </li>
  </div>
</template>

<script>
export default {
  props: {
      pid: '1'
  },
  data () {
    return {
      id: 0,
      title: '',
      url: ''
    }
  },
  method: {
    getSubTitle () {
      axios.get('/api/news/sub', {
        params: {
          pid: this.pid
        }
      })
      .then((res) => {
        console.log(res)
        this.id = res.data.id,
        this.title = res.data.title,
        this.url = res.data.title
      })
    }
  },
  mounted () {
    this.getSubTitle()
  }
}
</script>

<style>

</style>
