<template>
  <div>
    <ul class="list-group">
      <li class="list-group-item" v-for="(content, index) in contents" :key="index">
        <a :href="'/news/show/' + content.id" style="overflow: hidden;max-width: 240px">
          {{ content.title }}
        </a>
        <span class="pull-right">
          {{content.created_at.substr(0,10)}}
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
      itemsCount: 1,
      defaultPage: '1',
    }
  },
  mounted () {
      this.getContents(this.defaultPage)
  },
  watch: {
    '$route': 'getContents'
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
    getContents (page) {
      let id = this.$router.params.id
      axios.get('api/contents/', {
        params: {
          id: id,
          page: page
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
    },
    getPages (page) {
      axios.get('api/page/', {
        params: {
            page: page
        }
      })
      .then((res) => {
          this.contents = res.data.data.data
          this.pagination = res.data.pagination
      })
    }
  }
}
</script>

<style>
  
</style>
