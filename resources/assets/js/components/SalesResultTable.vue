<template>
  <div class="panel panel-default">
    <div class="panel-heading">Resultado das vendas no período</div>
    <div class="panel-body">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Status</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(result,index) in results" :key="index">
            <td>{{index | statusName}}</td>
            <td>{{result.amount}}</td>
            <td>{{result.total | currency}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    results: {
      type: Array,
      default: () => []
    }
  },
  filters: {
    statusName(val) {
      let result = "";
      switch (val) {
        case 0:
          result = "Vendidos";
          break;
        case 1:
          result = "Cancelados";
          break;
        case 2:
          result = "Devoluções";
          break;

        default:
          result = "Status Descconhecido";
          break;
      }
      return result
    }
  }
};
</script>
