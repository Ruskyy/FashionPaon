
<div class="card col-md-12 mx-auto" style="padding:2%">



<div class="row col-md-2" style="margin-bottom:2%;">
  <img class="img-card-top" src="Recources/logo_text.png" alt="Card image cap">
</div>

<form class="" action="index.html" method="post">
<div class="row">

  <div class="col-md-6">

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <input class="form-control form-control-lg" type="text" name="" value="" placeholder="First name" required />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input class="form-control form-control-lg" type="text" name="" value="" placeholder="Last name"  required/>
        </div>
      </div>
    </div>

    <input class="form-control form-control-lg" type="text" name="user" value="" placeholder="Username" required>
    <br>
    <input class="form-control form-control-lg" type="password" name="pass" value="" placeholder="Password" required>
    <br>
    <input class="form-control form-control-lg" type="password" name="confpass" value="" placeholder="Confirm Password" required>
    <br>
    <input class="form-control form-control-lg" type="date" name="data" value="" required>
    <br>
    <input class="form-control form-control-lg" type="email" name="email" value="" placeholder="email@email.com" required>

  </div>

  <div class="col-md-6">
    <div class="form-group">
      <input class="form-control form-control-lg" type="text" name="morada" value="" placeholder="Morada" required>
      <input class="form-control form-control-lg" type="text" name="morada2" value="" placeholder="Lote, nº Predio" required>
    </div>

    <select class="form-control" name="paises">
      <option value="">1</option>
    </select>
    <br>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <input class="form-control form-control-lg" type="text" name="codigo" value="" placeholder="Codigo" required />
        </div>
      </div>
      <h2>-</h2>
      <div class="col-md-5">
        <div class="form-group">
          <input class="form-control form-control-lg" type="text" name="postaç" value="" placeholder="Postal" required />
        </div>
      </div>
    </div>

    <br>

    <input class="form-control form-control-lg" type="text" name="tele" value="" placeholder="TELEFONE" maxlength="9" size="9" required>
    <br>
    <input class="form-control form-control-lg" type="text" name="nif" value="" placeholder="NIF" maxlength="9" size="9" required>
    <br>

  </div>



  </div>
  <br>
  <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn_sub"> Login </button>
  </form>
</div>
