<template>
  <div class="panel panel-default">
    <div class="panel-heading">Tabela de vendas no período</div>
    <div class="panel-body">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="sale in sales">
            <td>{{sale.sale_product.name}}</td>
            <td>{{sale.sale_date | dateBr}}</td>
            <td>{{sale.sale_price_final}}</td>
            <td>
              <btn>
                Editar
                <i class="fa fa-edit"></i>
              </btn>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import moment from 'moment'
export default {
  filters: {
    dateBr(value) {
      return moment(value)
        .locale("pt-br")
        .format("L");
    }
  },
  props: {
    sales: {
      type: Array,
      default: () => []
    }
  }
};
</script>
