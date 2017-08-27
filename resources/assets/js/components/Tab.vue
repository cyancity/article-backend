<template>
    <div>
        <li class="dropdown" v-for="parent in data">
            <a v-if="parent.url" :href="parent.url" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ parent.title }}
                <span class="caret"></span>
            </a>
            <a v-else class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ parent.title }}
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu" v-for="sub in parent.subItem">
                <li>
                    <router-link :to="'/' + sub.id ">
                        {{ sub.title }}
                    </router-link>
                </li>
                <li class="divider"></li>
            </ul>
        </li>
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
