<template>
  <nav
    class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient px-5 mb-4"
  >
    <div class="container-fluid">
      <router-link
        to="/"
        class="navbar-brand fw-bold fs-2 text-white border border-3 p-2"
        >giriapp_</router-link
      >
      <button
        class="navbar-toggler border border-0"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item mx-2">
            <router-link
              to="/"
              class="nav-link active text-white fs-5 efeitoUnderline"
              aria-current="page"
              >Página inicial</router-link
            >
          </li>
          <li class="nav-item mx-2">
            <router-link
              to="/about"
              class="nav-link text-white fs-5 efeitoUnderline"
              href="#"
              >Sobre o projeto</router-link
            >
          </li>
        </ul>
        <form class="d-flex">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Pesquisar"
            aria-label="Search"
            @input="search"
            v-model="input"
          />
        </form>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Header",
  data() {
    return{
      input: ''
    }
  },

  methods: {
    search: function(){
      this.$store.dispatch('fetchResults', this.input)
    }
  }
};
</script>

<style scoped>
.efeitoUnderline {
  position: relative;
}
.efeitoUnderline:before {
  content: "";
  position: absolute;
  width: 0;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: #fff;
  visibility: hidden;
  transition: all 0.3s ease-in-out;
}
.efeitoUnderline:hover:before {
  visibility: visible;
  width: 100%;
}
</style>
