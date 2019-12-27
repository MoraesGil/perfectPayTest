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
          <tr v-for="result in results">
            <td>{{result.status}}</td>
            <td>{{result.amount}}</td>
            <td>{{result.total}}</td>
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
};
</script>
