import { createStore } from "vuex";
import GiriaServices from "@/services/GiriaServices";

export default createStore({
  state: {
    girias: [],
  },
  mutations: {
    assignGirias(state, response){
      state.girias = response.data
    }
  },
  actions: {
    fetchResults({ commit }, str) {
      console.log(str)
      GiriaServices.filterGirias(str).then((response) => commit('assignGirias', response));
    },
  },
  modules: {},
});
