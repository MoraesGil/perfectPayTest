<template>
  <div class="input-group">
    <span class="input-group-addon">
      Período
    </span>
    <dropdown class="form-control">
      <div>{{rangeDate}} &nbsp</div>
      <template slot="dropdown">
        <li style="display: flex;">
          <div class="m5 p5">
            <span class="label label-default">De:</span>
            <date-picker
              v-model="initialDate"
              :today-btn="false"
              :clear-btn="false"
              :close-on-selected="false"
            />
          </div>
          <div class="m5 p5">
            <span class="label label-default">Até:</span>
            <date-picker
              v-model="endDate"
              :today-btn="false"
              :limit-from="initialDate"
              :clear-btn="false"
            />
          </div>
        </li>
      </template>
    </dropdown>
  </div>
</template>
<script>
import moment from "moment";

export default {
  created() {
    this.initialDate = moment().format();
  },
  data() {
    return {
      initialDate: null,
      endDate: null
    };
  },
  computed: {
    rangeDate() {
      if (!this.initialDate || !this.endDate) {
        this.$emit("range", null);
        return "";
      }
      this.$emit("range", {
        start_day: this.initialDate,
        end_day: this.endDate
      });
      return `${moment(this.initialDate)
        .locale("pt-br")
        .format("L")} à ${moment(this.endDate)
        .locale("pt-br")
        .format("L")}`;
    }
  }
};
</script>
<style scoped>
.m5 {
  margin: 5px;
}
.p5 {
  padding: 5px;
}
</style>
