<template>
  <div>
    <ul class="list-inline">
      <ul class="nav nav-tabs">
        <li class="active" v-for="(item,index) in tabItems" :key="index">
          <router-link :to="item.category" @click="getContents">
            {{item.category}}
          </router-link>
        </li>
      </ul>
    </ul>

    <ul class="list-group">
      <li class="list-group-item" v-for="(content, index) in contents" :key="index">
        <a :href="'/article/' + content.id">
          {{ content.title }}
        </a>
        <span>
          {{content.created_at}}
        </span>
      </li>
    </ul>

    <nav>
      <ul class="pagination pull-right">
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
        per_pgae: 10,
        from: 1,
        to: 0,
        current_page: 1
      },
      offset: 4,
      contents: [],
      items: [],
      itemsCount: 1,
      defaultItem: '1',
      tabItems: {},
    }
  },
    created () {
        this.getItems()
    },
  // beforeMount () {
  //   this.getItems()
  // },

  mounted () {
    this.getContents(this. defaultItem)
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
    getContents (item) {
      axios.get('api/contents/', {
        params: {
          item: item
        }
      })
      .then((res) => {
        console.log(res.data)
        this.contents = res.data.data.data
        this.pagination = res.data.pagination
      })
      .catch(function(error) {
        console.log(error)
      })
    },
    changePage: function(page) {
      this.pagination.current_page = page
      this.getContents(page)
      window.location.hash = '12'
    },
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
