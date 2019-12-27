<template>
  <dropdown>
    <btn class="dropdown-toggle col-md-12">
      {{selectedCostumer.name || "Clientes" }}
      <span class="caret"></span>
    </btn>
    <template slot="dropdown">
      <li>
        <a @click="setCostumer({})">Nenhum</a>
      </li>
      <li role="separator" class="divider"></li>
      <li v-for="costumer in costumers" :key="costumer.id">
        <a @click="setCostumer(costumer)">{{costumer.name}}</a>
      </li>
    </template>
  </dropdown>
</template>
<script>
import axios from "axios";
const END_POINTS = {
  costumers: "./api/costumers"
};
export default {
  mounted() {
    this.loadCostumers();
  },
  data() {
    return {
      isLoading: true,
      selectedCostumer: {},
      costumers: [{ value: 1, name: "Gilberto" }, { value: 2, name: "Moraes" }]
    };
  },
  methods: {
    loadCostumers() {
      axios.get(END_POINTS.costumers).then(response => {
        this.costumers = response.data || []
      }).catch(e=>console.log(e));
    },
    setCostumer(costumer) {
      this.selectedCostumer = costumer;
      this.$emit("selected", costumer);
    }
  }
};
</script>
