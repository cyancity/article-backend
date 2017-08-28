<template>
    <div>
        <li v-for="parent in data">
            <a v-if="parent.url" :href="parent.url">
                {{ parent.title }}
                <span class="caret"></span>
            </a>
            <a v-else >
                {{ parent.title }}
                <span class="caret"></span>
            </a>

            <ul v-for="sub in parent.subItem">
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
