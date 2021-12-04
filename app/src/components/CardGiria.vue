<template>
  <div class="col-12 mb-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ giria.nome }}</h5>
        <hr />
        <h6 class="card-subtitle mb-2 text-muted">
          {{ regiaoImplodida }}
        </h6>
        <p><b>1.</b> {{ primeiroSignificado }}</p>
        <div class="collapse" :id="'g'+giria.id">
          <p
            v-for="(significado, index) in giria.significados.slice(1)"
            :key="significado"
            class="card-text"
          >
            <b>{{ index + 2 }}.</b> {{ significado }}
          </p>
        </div>
        <hr />
        <div class="d-flex mt-2 justify-content-between">
          <button
            data-bs-toggle="collapse"
            :data-bs-target="'#g' + giria.id"
            :aria-controls="giria.id"
            aria-expanded="false"
            class="btn btn-primary"
            type="button"
            v-on:click="toggleHidden()"
          >
            Outros significados
          </button>
          <router-link
            :to="{ name: 'GiriaDetalhes', params: { id: giria.id } }"
            class="btn btn-white card-link"
            >Ver mais</router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardGiria",

  props: ["giria"],

  methods: {
    toggleHidden() {
      const c = document.getElementById('g'+this.giria.id);

      if (c.classList.contains("show")) {
        c.classList.remove("show");
      } else {
        c.className += " show";
      }
    },
  },

  computed: {
    regiaoImplodida() {
      return this.giria.local.join("/");
    },

    primeiroSignificado() {
      return this.giria.significados[0];
    },
  },
};
</script>

<style scoped>
.card-link {
  text-decoration: none;
}
</style>
