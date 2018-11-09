<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];
  $output = '';
  $dado =mysqli_query($conn,"SELECT cliente_id, cliente_username, cliente_nome, cliente_apelido, cliente_email  FROM cliente WHERE cliente_tipo = 0");

  $output .='
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Cliente</h4>
                      <p id="btns" class="category">Listar</p>
                  </div>
                  <div class="content table-responsive table-full-width">
                      <table class="table table-hover table-striped" id="myTable">
                          <thead>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>Username</th>
                            <th>Mail</th>
                          </thead>
                          <tbody>';
              while ($rows=mysqli_fetch_assoc($dado)){
                  $output .='
                  <tr>
                    <td>'.$rows['cliente_nome'].'</td>
                    <td>'.$rows['cliente_apelido'].'</td>
                    <td>'.$rows['cliente_username'].'</td>
                    <td>'.$rows['cliente_email'].'</td>
                    <td>
                      <button type="button" rel="tooltip" title="Carrinho" class="btn btn-success btn-simple btn-xs" onclick="">
                          <i class="fa fa-shopping-cart"></i>
                      </button>
                      <button type="button" rel="tooltip" title="Informação" class="btn btn-warning btn-simple btn-xs" onclick="myFunction_inf('.$rows['cliente_id'].')">
                          <i class="fa fa-list-alt"></i>
                      </button>
                      <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs" onclick="myFunction_edit('.$rows['cliente_id'].')">
                          <i class="fa fa-edit"></i>
                      </button>
                      <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="myFunction_delet('.$rows['cliente_id'].')">
                          <i class="fa fa-times"></i>
                      </button>
                    </td>
                  </tr>';
              }
              $output .='
              </tbody>
          </table>

      </div>
  </div>
</div>
<div id="sub_menu_aqui">

</div>
</div>
</div>';

echo $output;
  ?>



                <!--  Model for ajax
                <tr>
                  <td>1</td>
                  <td>Dakota Rice</td>
                  <td>$36,738</td>
                  <td>Niger</td>
                  <td>
                    <button type="button" rel="tooltip" title="List" class="btn btn-warning btn-simple btn-xs">
                        <i class="fa fa-list-alt"></i>
                    </button>
                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-times"></i>
                    </button>
                  </td>

                </tr>
                -->
<script>

var $table = document.getElementById("myTable"),
$bttns = document.getElementById("btns"),
// number of rows per page
$n = 10,
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
    for ($i=1; $i<=$pCount;$i++){
        $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
      }
    $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' class='btn btn-secondary' style='padding:2px 10px;' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+"></div>";
    return $buttons;
  }
</script>
