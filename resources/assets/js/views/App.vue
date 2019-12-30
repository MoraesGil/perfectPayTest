<template>
  <div class="container" id="main">
    <div class="row">
      <costumer-picker class="col-md-5" @selected="val => selectedCostumer = val" />
      <div class="col-md-5">
        <range-picker @range="(range) => rangePicker = range" />
      </div>
      <div class="col-md-1 pull-right">
        <btn @click="fetchSales" class="form-control" :disabled="!canFetch">
          <i class="fa fa-search"></i>
        </btn>
      </div>
    </div>

    <div class="row top10" v-if="showSales || true">
      <div class="col-md-12">
        <sales-table :sales="sales" />
      </div>
    </div>

    <div class="row top10" v-if="showResults || true">
      <div class="col-md-12">
        <sales-result-table :results="results" />
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
      sales: []
    };
  },
  computed: {
    results() {
      return this.sales.reduce((data, sale) => {
        if (!data[sale.sale_status])
          data[sale.sale_status] = { amount: 0, total: 0 };

        data[sale.sale_status].total =
          data[sale.sale_status].total + parseFloat(sale.sale_price_final);
        data[sale.sale_status].amount =
          data[sale.sale_status].amount + parseInt(sale.sale_amount);

        return data;
      }, []);
    },
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
      return this.results.length > 0;
    }
  },
  methods: {
    fetchSales() {
      axios
        .get(
          `/api/costumers/${this.selectedCostumer.id}/sales?from_date=${this.rangePicker.start_day}&to_date=${this.rangePicker.end_day}`
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
