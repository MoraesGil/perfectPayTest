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
            <td>{{sale.sale_date}}</td>
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
export default {
  props: {
    sales: {
      type: Array,
      default: () => []
    }
  }
};
</script>
