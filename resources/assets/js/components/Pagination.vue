<template>
  <div>
    <ul class="list-group">
      <li class="list-group-item" v-for="(item, index) in items" :key="index">
        <a href="/article/{{item.id}}">
          {{ item.title }}
        </a>
      </li>
    </ul>
    <nav>
      <ul>
        <li v-if="pagination.current_page > 1">
          <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
            <span aria-hidden="true">1</span>
          </a>
        </li>
        <li v-for="(page, index) in pagesNumber" :key="index" :class="[page == isActived ? 'active' : '']">
          <a href="#" @click.prevent="changePage(page)">
            {{ page }}
          </a>
        </li>
        <li v-if="pagination.current_page < pagination.last_page">
          <a href="#" aria-label="Next" @click.prevent="changePage(pagination.currnet_page + 1)">
            <span aria-hidden="true">2</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  data () {
    return {
      pagination: {
        total: 0,
        per_pgae: 7,
        from: 1,
        to: 0,
        current_page: 1
      },
      offset: 4,
      items: []
    }
  },
  mounted () {
    this.getItems(this.pagination.current_page);
  },
  computed: {
    isActived: function () {
      return this.pagination.current_page
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return []
      }
      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1
      }
      var to = from + (this.offset * 2)
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page
      }
      var pagesArray = []
      while (from <= to ) {
        pagesArray.push(from)
        from++
      }
      return pagesArray
    }
  },
  methods: {
    getItems () {
      this.$axios.get('api/article/', {
        params: {
          page: page
        }
      })
      .then(function(res) {
        this.items = res.data.data.data
        this.pagination = res.data.pagination
      })
      .catch(function(error) {
        console.log(error)
      })
    },
    changePaeg: function(page) {
      this.pagination.current_page = page
      this.getItems(page)
    }
  }
}
</script>

<style>
  
</style>
