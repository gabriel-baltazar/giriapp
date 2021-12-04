<template>
  <div class="home w-100">
    <div class="row  d-flex justify-content-center">
      <div class="col-lg-4" v-for="(giria, index) in $store.state.girias" :key="index">
        <CardGiria
          v-if="index < showIndex"
          :giria="giria"
        />
      </div>
    </div>
    <!-- por algum motivo o esquema do v-if quebrou a página,
    então a exibição será feita por classes -->
    <div class="row d-flex mb-5 justify-content-center">
      <div class="col-lg-4">
        <button :class="'btn btn-primary w-100 ' + hideButton" @click="verMais">Ver mais</button>
      </div>
    </div>
  </div>
</template>

<script>
import CardGiria from "@/components/CardGiria.vue";

export default {
  name: "Home",

  components: {
    CardGiria,
  },

  data() {
    return {
      showIndex: 9,
      hideButton: "",
    };
  },

  created() {
    this.$store.dispatch('fetchResults', '')
    this.hideButton = this.$store.state.girias.length <= 9 ? this.hideButton = "d-none" : ''
  },

  methods: {
    verMais() {
      console.log(this.$store.state.girias.length)
      this.showIndex = this.showIndex + 9;
      if (this.showIndex > this.$store.state.girias.length) {
        this.hideButton = "d-none";
      }
    },
  },
};
</script>
