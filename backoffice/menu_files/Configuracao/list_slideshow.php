<div class="col-md-6 form-group" style="margin-top:1%;">
  <h4 class="title">Slides</h4>
  <hr>
  <div id="btns"></div>
  <table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Desc.</th>
        <th scope="col">Btn?</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      //echo '<option value="'.$efect['code_texteffect'].'">'.$efect['desc_texteffect'].'</option>';
      include '../../../php/conn.php';
      $query = "SELECT id_slide,slide_state,image_slide,title_slide,desc_slide,button_slide FROM slider";
      $slides = mysqli_query($conn,$query);
      $ordem = 1;
      while ($slide=mysqli_fetch_assoc($slides)) {
        echo '
        <tr>
          <th scope="row">'.$ordem.'</th>
          <td>'.$slide['title_slide'].'</td>
          <td>'.$slide['desc_slide'].'</td>
          <td>';
          if ($slide['button_slide']=='on') {
            echo '<i class="fa fa-check"></i>';
          }
          echo '</td>
          <td>';
          if($slide['slide_state'] == 1){
            echo '
            <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs" onclick="myFunction_updateSlideshow('.$slide['id_slide'].',1)">
                <i class="fa fa-eye"></i>
            </button>';
          }
          if($slide['slide_state'] == 0){
            echo '
            <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs" onclick="myFunction_updateSlideshow('.$slide['id_slide'].',0)">
                <i class="fa fa-eye-slash"></i>
            </button>';
          }
            echo '
            <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="myFunction_deletSlideshow('.$slide['id_slide'].')">
                <i class="fa fa-times"></i>
            </button>
          </td>
        </tr>
        ';
        $ordem = $ordem+1;
      }?>
    </tbody>
  </table>

</div>



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
