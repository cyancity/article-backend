<template>
  <div>
    <ul class="dropdown-menu" role="menu">
      <li>
        <a href="">
          你哈啊
        </a>
      </li>
    </ul>
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
