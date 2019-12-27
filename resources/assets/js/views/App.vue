<template>
  <div class="container" id="main">
    <div class="row">
      <costumer-picker class="col-md-5" @selected="val => selectedCostumer = val" />
      <div class="col-md-5">
        <range-picker @range="(range) => rangePicker = range" />
      </div>
      <div class="col-md-1 pull-right">
        <btn @click="fetchAll" class="form-control" :disabled="!canFetch">
          <i class="fa fa-search"></i>
        </btn>
      </div>
    </div>

    <div class="row top10" v-if="showSales">
      <div class="col-md-12">
        <sales-table :sales="sales" />
      </div>
    </div>

    <div class="row top10" v-if="showResults">
      <div class="col-md-12">
        <sales-result-table :sales="results" />
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";
import RangePicker from "../components/RangePicker";
import CostumerPicker from "../components/CostumerPicker";
import SalesTable from "../components/SalesTable";
import SalesResultTable from "../components/SalesResultTable";

export default {
  components: { RangePicker, CostumerPicker, SalesTable, SalesResultTable },
  data() {
    return {
      rangePicker: null,
      selectedCostumer: {},
      sales: [],
      results: []
    };
  },
  computed: {
    canFetch() {
      return (
        this.selectedCostumer.id > 0 &&
        this.rangePicker != null &&
        this.rangePicker.start_day &&
        this.rangePicker.end_day
      );
    },
    showSales() {
      return this.sales.length > 0;
    },
    showResults() {
      return this.sales.length > 0;
    }
  },
  methods: {
    fetchAll() {
      this.fetchSales();
      this.fetchResults();
    },
    fetchSales() {
      axios
        .get(
          `/api/costumers/${this.selectedCostumer.id}/sales?from_date=${this.rangePicker.start_day}&to_date=${this.rangePicker.end_day}`
        )
        .then(response => {
          this.sales = response.data || [];
        })
        .catch(e => console.log(e));
    },
    fetchResults() {
      axios
        .get(
          `/api/costumers/${this.selectedCostumer.id}/sales-results?from_date=${this.rangePicker.start_day}&to_date=${this.rangePicker.end_day}`
        )
        .then(response => {
          this.sales = response.data || [];
        })
        .catch(e => console.log(e));
    }
  }
};
</script>
<style>
#main {
  margin-top: 5%;
}
.m5 {
  margin: 5px;
  border: 1px solid #ccc;
}
.top10 {
  margin-top: 10px;
}
</style>
