<template>
  <div>
    <ul class="nav nav-tabs">
      <li>

      </li>
    </ul>
    <ul class="list-group">
      <li class="list-group-item" v-for="(item, index) in items" :key="index">
        <a :href="'/article/' + item.id">
          {{ item.title }}
        </a>
        <span>
          {{item.created_at}}
        </span>
      </li>
    </ul>
    <nav>
      <ul class="pagination">
        <li v-if="pagination.current_page > 1">
          <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li v-for="(page, index) in pagesNumber" :key="index" :class="[page == isActived ? 'active' : '']">
          <a href="#" @click.prevent="changePage(page)">
            {{ page }}
          </a>
        </li>
        <li v-if="pagination.current_page < pagination.last_page">
          <a href="#" aria-label="Next" @click.prevent="changePage(pagination.currnet_page + 1)">
            <span aria-hidden="true">&raquo;</span>
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
    getItems (page) {
      axios.get('api/article/', {
        params: {
          page: page
        }
      })
      .then((res) => {
        this.items = res.data.data.data
        this.pagination = res.data.pagination
      })
      .catch(function(error) {
        console.log(error)
      })
    },
    changePage: function(page) {
      this.pagination.current_page = page
      this.getItems(page)
    },
    getCate (category) {
      axios.get('')
    }
  }
}
</script>

<style>
  
</style>
