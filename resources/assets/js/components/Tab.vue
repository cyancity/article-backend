<template>
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown" v-for="parent in data">
                <a v-if="parent.url" :href="parent.url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ parent.title }} <span class="caret"></span></a>
                <a v-else class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ parent.title }} <span class="caret"></span></a>
                <ul class="dropdown-menu"  v-for="sub in parent.subItem">
                    <li>
                        <router-link :to="'/' + sub.id ">
                            {{ sub.title }}
                        </router-link>
                    </li>
                    <li role="separator" class="divider"></li>
                </ul>
            </li>
        </ul>
    </div>

</template>

<script>
export default {
  data () {
    return {
        data: []
    }
  },
  created () {
    this.getNav()
  },
  methods: {
    getNav () {
      axios.get('api/nav')
      .then((res) => {
        this.data = res.data
      })
    }
  }
}
</script>

<style>

</style>
