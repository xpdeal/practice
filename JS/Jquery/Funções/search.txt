===========================
|Campo de busca           |
---------------------------
  <div class="modal-col-right">
        <div class="table">
          <div class="table-details">
            <strong>Mesas</strong>
            <div class="form-group">
              <input id="table_search" class="form-control input-lg" type="search" 				placeholder="Pesquise por uma mesa">
            </div>
          </div>
      </div>
===========================
|Tabele de mesas          |
---------------------------
      <div class="table-tables" id="mesas">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Cód.</th>
                <th>Nome</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transferTables as $table) : ?>
                <?= Html::beginTag('tr', ['data-attributes' => Json::encode($table)]) ?>
                <td id="<?= $table->code ?>"><?= $table->code ?></td>
                <td class="item"><?= $table->name ?></td>
                <?= Html::endTag('tr') ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
===========================
|Jquery Buscar cod ou nome|
---------------------------
listTables: function() {
      var $table = $('.table-tables tbody'),
        $tr = $table.find('tr').clone();

      $('#table_search').on('keyup', function() {
        var value = $(this).val().toLowerCase();

        $tr.each(function() {
          var $row = $(this);
          var rowText = $row.text().toLowerCase();

          if (rowText.indexOf(value) < 0) {
            $row.addClass('hide');
          } else {
            $row.removeClass('hide');
          }
        });

        $table.html($tr.not('.hide'));
      });

Definição Macro
O código que você forneceu é um exemplo de manipulador de eventos jQuery. Um manipulador de eventos é uma função chamada quando ocorre um evento específico. Nesse caso, o manipulador de eventos é chamado quando o usuário digita algo na barra de pesquisa. O código primeiro obtém o valor da barra de pesquisa e, em seguida, percorre todas as linhas da tabela. Para cada linha, ele obtém o texto da linha e verifica se o valor da pesquisa está contido no texto. Se o valor da pesquisa estiver contido no texto, a linha será exibida. Caso contrário, a linha é ocultada. Finalmente, o código atualiza a tabela com as linhas visíveis.

Definição 
O código acima define uma função chamada "listProducts". Esta função é executada quando uma tecla é pressionada no campo de entrada com o id "product_search".

Dentro da função, o código primeiro clona as linhas de uma tabela com a classe "table-products" e as armazena em uma variável chamada "$tr".

Em seguida, ele configura um ouvinte de evento para o evento "keyup" no campo de entrada "product_search". Isso significa que sempre que uma tecla for liberada naquele campo de entrada, a função dentro do event listener será executada.

Dentro da função de ouvinte de eventos, o código obtém o valor do campo de entrada "product_search", converte-o em minúsculas e armazena-o em uma variável chamada "value".

Em seguida, o código itera sobre cada linha nas linhas da tabela clonada usando a função "each". Para cada linha, ele converte o conteúdo de texto da linha em letras minúsculas e o armazena em uma variável chamada "rowText".

Em seguida, verifica se o "valor" foi encontrado no "rowText" usando a função "indexOf". Se o valor não for encontrado (o "indexOf" retorna -1), ele adiciona a classe "hide" à linha usando a função "addClass". Caso contrário, ele remove a classe "hide" da linha usando a função "removeClass".

Finalmente, o código substitui o conteúdo da tabela original pelas linhas clonadas que não possuem a classe "hide" usando a função "html".

Em resumo, o código configura uma funcionalidade de pesquisa ao vivo para uma tabela. Sempre que uma chave é liberada no campo de entrada "product_search", a tabela é filtrada para mostrar apenas as linhas que contêm o valor pesquisado.