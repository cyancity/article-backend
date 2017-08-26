<template>
    <div>
        <li class="dropdown" v-for="">
            <a v-if="" :href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ }}
                <span class="caret"></span>
            </a>
            <a v-else class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ }}
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu" v-for="">
                <li>
                    <router-link :to="'/news/' + ">
                        {{ }}
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
        first: [],
        sub: []
    }
  },
  created () {
    this.getNav()
  },
  methods: {
    getNav () {
      axios.get('api/nav')
      .then((res) => {
        console.log(res)
        this.first = res.data,first
        this.sub = res.data,sub
      })
    }
  }
}
</script>

<style>

</style>
