<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

  $dado =mysqli_query($conn,"SELECT ad_encomendas_id, ad_encomendas_preco, ad_encomendas_quantidades, ad_encomendas_estado,
                                    ad_encomendas_id_tabela, ad_encomendas_tabela, ad_encomendas_data, ad_encomendas_datafim FROM ad_encomendas");
?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-6" >
            <div class="card">
                <div class="header">
                    <h4 class="title">Striped Table with Hover</h4>
                    <p id="btns" class="category">Here is a subtitle for this table</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead>
                          <th>Produto</th>
                          <th>Tamanho</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Começou</th>
                          <th>Acaba</th>
                          <th></th>
                          <th>Ano</th>
                          <th>Mês</th>
                          <th>Dia</th>
                          <th>Hora</th>
                          <th>Minuto</th>
                          <th>Segundo</th>
                        </thead>
                        <tbody>
                        <?php
                        while ($rows = mysqli_fetch_assoc($dado)){
                          if($rows['ad_encomendas_tabela'] == 1){
                              $queryidcategoria = "SELECT
                                                    stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
                                                      FROM stock WHERE stock_id = ".$rows['ad_encomendas_id_tabela'];
                              $stock = mysqli_fetch_assoc(mysqli_query($conn, $queryidcategoria));
                              $queryidpublico = "SELECT
                                                  produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                                                    FROM produto WHERE produto_id = ".$stock['stock_idproduto'];
                              $prod = mysqli_fetch_assoc(mysqli_query($conn, $queryidpublico));

                              $nowDate = new DateTime();
                              $nowDate->setTimezone(new DateTimeZone('Europe/Lisbon'));
                              $nowDate = $nowDate->format("Y/m/d G:i:s");

                              $finalDate = strtotime($rows['ad_encomendas_datafim']);
                              $finalDate = date("Y/m/d G:i:s",$finalDate);
                              $finalDate = strtotime($finalDate);
                              $nowDate = strtotime($nowDate);
                              $diff = abs($nowDate - $finalDate);
                              $diffy = floor($diff / (365*60*60*24));
                              $diffmth = floor(($diff - $diffy * 365*60*60*24)
                                                             / (30*60*60*24));
                              $diffd = floor(($diff - $diffy * 365*60*60*24 -
                                           $diffmth*30*60*60*24)/ (60*60*24));
                              $diffh = floor(($diff - $diffy * 365*60*60*24
                                     - $diffmth*30*60*60*24 - $diffd*60*60*24)
                                                                 / (60*60));
                              $diffm = floor(($diff - $diffy * 365*60*60*24
                                       - $diffmth*30*60*60*24 - $diffd*60*60*24
                                                        - $diffh*60*60)/ 60);
                              $diffs = floor(($diff - $diffy * 365*60*60*24
                                       - $diffmth*30*60*60*24 - $diffd*60*60*24
                                              - $diffh*60*60 - $diffm*60));

                              if($diff >= 0){
                                $messr = "+";
                              }else {
                                $messur = "-";
                              }
                              ?>
                                <tr>
                                  <td><?php echo $prod["produto_nome"];?></td>
                                  <td><?php echo $stock["stock_prodtamanho"];?></td>
                                  <td><?php echo $rows["ad_encomendas_quantidades"];?></td>
                                  <td><?php echo $rows["ad_encomendas_preco"];?></td>
                                  <td><?php echo $rows["ad_encomendas_data"];?></td>
                                  <td><?php echo $rows["ad_encomendas_datafim"];?></td>
                                  <td><?php echo $messr;?></td>
                                  <td><?php echo $diffy;?></td>
                                  <td><?php echo $diffmth;?></td>
                                  <td><?php echo $diffd;?></td>
                                  <td><?php echo $diffh;?></td>
                                  <td><?php echo $diffm;?></td>
                                  <td><?php echo $diffs;?></td>
                                  <td>
                                    <button type="button" rel="tooltip" title="Desconto" class="btn btn-success btn-simple btn-xs" onclick="">
                                        <i class="fa fa-ticket"></i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Informação" class="btn btn-warning btn-simple btn-xs" onclick="">
                                        <i class="fa fa-list-alt"></i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Informação" class="btn btn-warning btn-simple btn-xs" onclick="">
                                        <i class="fa fa-list-alt"></i>
                                    </button>
                                  </td>
                                </tr><?php
                              }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="col-md-6" >
            <div id="sub_menu_aqui">

            </div>
          </div>
        </div>
      </div>
<?php
/**

*/


    /*
    myFunction_editProd
    myFunction_addProdStock
    myFunction_addProdImg
    myFunction_gerProdStock
    myFunction_gerProdImg
    */
    ?>
        <script>
        var $table = document.getElementById("myTable"),
        $bttns = document.getElementById("btns"),
        // number of rows per page
        $n = 6,
        // number of rows of the table
        $rowCount = $table.rows.length,
        // get the first cell's tag name (in the first row)
        $firstRow = $table.rows[0].firstElementChild.tagName,
        // boolean var to check if table has a head row
        $hasHead = ($firstRow === "TH"),
        // an array to hold each row
        $tr = [],
        // loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
        $i,$ii,$j = ($hasHead)?1:0,
        // holds the first row if it has a (<TH>) & nothing if (<TD>)
        $th = ($hasHead?$table.rows[(0)].outerHTML:"");
        // count the number of pages
        var $pageCount = Math.ceil($rowCount / $n);
        // if we had one page only, then we have nothing to do ..
        if ($pageCount > 1) {
          // assign each row outHTML (tag name & innerHTML) to the array
          for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
          $tr[$ii] = $table.rows[$i].outerHTML;
          // create a div block to hold the buttons
          $bttns.insertAdjacentHTML("afterend","<div id='btscryp' class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'></div>");
          // the first sort, default page is the first one
          sort(1);
        }

        // ($p) is the selected page number. it will be generated when a user clicks a button
        function sort($p) {
          /* create ($rows) a variable to hold the group of rows
          ** to be displayed on the selected page,
          ** ($s) the start point .. the first row in each page, Do The Math
          */
          var $rows = $th,$s = (($n * $p)-$n);
          for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
          $rows += $tr[$i];

          // now the table has a processed group of rows ..
          $table.innerHTML = $rows;
          // create the pagination buttons
          document.getElementById("btscryp").innerHTML = pageButtons($pageCount,$p);
          // CSS Stuff
        }
        // ($pCount) : number of pages,($cur) : current page, the selected one ..
        function pageButtons($pCount,$cur) {
          /* this variables will disable the "Prev" button on 1st page
          and "next" button on the last one */
          var $prevDis = ($cur == 1)?"disabled":"",
          $nextDis = ($cur == $pCount)?"disabled":"",
          /* this ($buttons) will hold every single button needed
          ** it will creates each button and sets the onclick attribute
          ** to the "sort" function with a special ($p) number..
          */
          $buttons = "<div class='btn-group mr-2' role='group' aria-label='First group'>";
            $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
            /*for ($i=1; $i<=$pCount;$i++){
              $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
            }*/
            $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' class='btn btn-secondary' style='padding:2px 10px;' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+"></div>";
            return $buttons;
          }
        </script>
