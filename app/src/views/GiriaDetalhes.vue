<template>
  <div class="card w-100" v-if="giria">
    <div class="card-body">
      <h1 class="card-title text-center">{{ giria.nome }}</h1>
      <hr />
      <h4 class="card-subtitle mb-2 text-muted">
        {{ regiaoImplodida }}
      </h4>
      <div class="row">
        <div class="mt-5 col-sm-6">
          <p
            v-for="(significado, index) in giria.significados"
            :key="significado"
            class="card-text"
          >
            <b>{{ index + 1 }}.</b> {{ significado }}
          </p>
        </div>
        <div class="mt-5 col-sm-6">
          <div class="d-flex justify-content-center mb-5">
            <img :src="giria.imagem" alt="" />
          </div>
          <div class="d-flex justify-content-center mb-5">
            <iframe
              id="ytplayer"
              type="text/html"
              width="640"
              height="360"
              enablejsapi="1"
              :src="'https://www.youtube.com/embed/' + giria.videoId"
              frameborder="0"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import GiriaServices from "@/services/GiriaServices.js";

export default {
  name: "GiriaDetalhes",
  props: ["id"],

  data() {
    return {
      giria: null,
    };
  },

  created() {
    GiriaServices.getGiria(this.id)
      .then((response) => {
        this.giria = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
