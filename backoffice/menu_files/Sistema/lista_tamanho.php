<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];

  if($tipo == 0){
      $tipos= " ";
  }else{
    $tipos= " WHERE id_categoria_tamanho = ".$tipo;
  }
  ?>

<table class="table table-hover table-striped" id="myTable">
  <thead>
    <th>tamanho</th>
    <th>Categoria</th>
  </thead>
  <tbody>
    <?php
    include '../../../php/conn.php';
    $querytam = "SELECT nome_tamanho, id_categoria_tamanho FROM tamanho".$tipos;
    $tamanhos = mysqli_query($conn,$querytam);
    while (@$tamanho = mysqli_fetch_assoc($tamanhos)) {
      $categoria = mysqli_query($conn,"SELECT categoria_id, categoria_nome FROM categoria WHERE categoria_id like $tamanho[id_categoria_tamanho]");
      $categoria = mysqli_fetch_assoc($categoria)
      ?>
      <tr>
        <td><?php echo $tamanho['nome_tamanho']; ?></td>
        <td><?php echo $categoria['categoria_nome']; ?></td>
        <td>
          <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="">
              <i class="fa fa-times"></i>
          </button>
        </td>
      </tr>
      <?php
    }
    include '../../../php/deconn.php';?>
  </tbody>
</table>




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
