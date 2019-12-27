<template>
  <div class="container" id="main">
    <div class="row">
      <costumer-picker class="col-md-5"></costumer-picker>
      <div class="col-md-5">
        <range-picker @range="(range) => rangePicker = range" />
      </div>
      <div class="col-md-1 pull-right">
        <btn class="form-control ">
          <i class="fa fa-search"></i>
        </btn>
      </div>
    </div>

    <div class="row top10">
      <div class="col-md-12">
        <sales-table />
      </div>
    </div>

    <div class="row top10">
      <div class="col-md-12">
        <sales-result-table />
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
  methods: {
    setCostumer(costumer) {
      this.selectedCostumer = costumer;
    }
  },
  data() {
    return {
      rangePicker: null,
      selectedCostumer: {}
    };
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
