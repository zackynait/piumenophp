    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
<?php

if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}
//require_once "./models/VoucherModel.php";


include "./reserved-navbar.php";
include_once "./utils/company_name_selector.php";
require_once "./models/UserModel.php";
require_once "./models/SubscriptionModel.php";
$customers=UserModel::get_all()->fetch_all(MYSQLI_ASSOC);
$history=SubscriptionModel::get_history()->fetch_all(MYSQLI_ASSOC);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"></script>

<link href="https://cdn.jsdelivr.net/npm/neomo@2.1.0/dist/neomo.min.css"rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/neomo@2.1.0/dist/neomo.min.js"></script>
<div class="wrapper">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="shadow"></div>
    <div class="shadow"></div>
    <div class="shadow"></div>
</div>
<div class="h-screen flex-grow-1 overflow-y-lg-auto main" style="display:none;">
<main class="py-6 bg-surface-secondary">

<div class="container main hidden-until-ready"  >
        <h1 class="text-center">PAGINA ADMIN</h1>
        <br>
        <div class="card-add">
  <div class="card-add-inner">
    <h2>I TUOI CLIENTI</h2>
  </div>
</div>
    <h3></h3><br>
    <div class="table-responsive">
   <table id="myCustomerTable" class="table table-bordered table-striped"> 
    <thead>
      <tr>
          <th>Nome Cognome</th>
          <th>Via</th>
          <th>Cap</th>
          <th>Citta</th>
          <th>Provincia</th>
          <th>Telefono</th>
          <th>Cellulare</th>
      </tr>
    </thead>
    <tbody id="myCustomerTableBody">
    <?php foreach($customers as $row) { ?>
      <tr>
      <td><?=$row["Ragione_sociale"] ?></td>
      <td><?=$row["Via"] ?></td>
      <td><?=$row["Cap"] ?></td>
      <td><?=$row["Citta"] ?></td>
      <td><?=$row["Provincia"] ?></td>
      <td><?=$row["Telefono"] ?></td>
      <td><?=$row["Cellulare"] ?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>
<br><br><br>
  <h3><b>STORICO ABBONAMENTI</b></h3><br>
    <!--<input class="form-control" id="myInputCustomerTable" type="text" placeholder="Cerca.."><br>-->
    <div class="table-responsive">
   <table id="myHistoryTable" class="table table-bordered table-striped"> 
    <thead>
      <tr>
          <th>Codice</th>
          <th>Dest.</th>
          <th>Tipo_di_abbonamento</th>
          <th>Q.ta carnet</th>
          <th>€/ldv</th>
          <th>Q.ta ldv</th>
          <th>Costo imp. Carnet</th>
          <th>Diritto Fisso imp.</th>
          <th>Costo carnet totale iva inclusa</th>
          <th>Condizioni di pagamento</th>
      </tr>
    </thead>
    <tbody id="myHistoryTableBody">
    <?php foreach($history as $row) { ?>
      <tr>
      <td><?=$row["Codice"] ?></td>
      <td><?=$row["Dest."] ?></td>
      <td><?=$row["Tipo_di_abbonamento"] ?></td>
      <td><?=$row["Quantita carnet"] ?></td>
      <td><?=$row["Costo per lettera di vettura"] ?></td>
      <td><?=$row["Quantita_lettere_di_vettura"] ?></td>
      <td><?=$row["Costo imponibile Carnet"] ?></td>
      <td><?=$row["Diritto Fisso imponibile"] ?></td>
      <td><?=$row["Costo carnet totale iva inclusa"] ?></td>
      <td><?=$row["Condizioni di pagamento"] ?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>


</div>
</main>
</div>
</div>




<script>


$(document).ready(function () {
  
  $('#myCustomerTable').DataTable();
  $('#myHistoryTable').DataTable();
  $('#myCustomerTable').addClass("outset-neomo");
  $('#myCustomerTable').removeClass("table-striped");

  $('#myHistoryTable').addClass("outset-neomo");
  $('#myHistoryTable').removeClass("table-striped");
  $('.dataTables_empty').text("nessun elemento trovato"); 
  setTimeout(function (){
   $('.wrapper').fadeOut(100);       
}, 2000);
 $('.main').addClass('ready');
 setTimeout(function (){
  $('.main').fadeIn(500);     
}, 2000);

});


$(document).ready(function(){
  $("#myInputCustomerTableBody").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myCustomerTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
</script>

<style>
 .ready{
  display:block; 
 }
h1 {
  font-size: 70px;
  font-weight: 600;
  background-image: linear-gradient(to left, #553c9a, #b393d3);
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
  font-family: Helvetica, Sans-serif;
  text-shadow: inset 2px 2px 4px red, inset -2px -2px 4px #f9f9f9;
  box-shadow: var black,
               
}

h3 {
  font-family: Helvetica, Sans-serif;
  font-size: 40px;
  font-weight: 400;
  background-image: linear-gradient(to left, #7FFFD4, #00008B);
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
}



/* ADD CARD */
.card-add {
	 display: flex;
	 color: #cbcbcb;
	 font-size: 50px;
	 scale: 0.8;
	 height: 80px;
	 width: 350px;
	 user-select: none;
	 border-radius: 50px;
	 background: #e0e0e0;
	 box-shadow: 0 0 0 #bebebe, 0 0 0 #fff;
	/* HOVER OFF, no delay*/
	 transition: ease-in box-shadow 0.2s, ease filter 0.1s;
}
 .card-add:hover {
	 cursor: pointer;
	 box-shadow: 11px 11px 50px #bebebe, -11px -11px 50px #fff;
	/* HOVER ON, add delay */
	 transition: ease-out box-shadow 0.2s 0.2s, ease filter 0.1s;
}
 .card-add:active {
	 filter: brightness(92%);
}
/* ADD CARD - INNER EFFECT DIV */
 .card-add-inner {
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 padding: 1rem;
	 width: 100%;
	 border-radius: 50px;
	 background: #e0e0e0;
	 box-shadow: inset 20px 20px 60px #bebebe, inset -20px -20px 60px #fff;
	/* HOVER OFF, add delay */
	 transition: ease-out box-shadow 0.2s 0.2s;
}
 .card-add-inner:hover {
	 box-shadow: inset 0 0 0 #bebebe, inset 0 0 0 #fff;
	/* HOVER ON, no delay */
	 transition: ease-in box-shadow 0.2s;
}
/* ADD CARD - H2 PLUS */
 .card-add-inner h2 {
	 margin: 0;
	 transition: ease scale 0.5s;
}
 .card-add-inner:hover h2 {
	 scale: 1.3;
}
 


 /**loader */
 .wrapper {
  width: 200px;
  height: 70px;
  position: relative;
  z-index: 1;
  margin :20%;
  margin-left :30%;
}

.circle {
  width: 20px;
  height: 20px;
  position: absolute;
  border-radius: 50%;
  background-color: #00308F;
  left: 15%;
  transform-origin: 50%;
  animation: circle7124 .5s alternate infinite ease;
}

@keyframes circle7124 {
  0% {
    top: 60px;
    height: 5px;
    border-radius: 50px 50px 25px 25px;
    transform: scaleX(1.7);
  }

  40% {
    height: 20px;
    border-radius: 50%;
    transform: scaleX(1);
  }

  100% {
    top: 0%;
  }
}

.circle:nth-child(2) {
  left: 45%;
  animation-delay: .2s;
}

.circle:nth-child(3) {
  left: auto;
  right: 15%;
  animation-delay: .3s;
}

.shadow {
  width: 20px;
  height: 4px;
  border-radius: 50%;
  background-color: rgba(0,0,0,0.9);
  position: absolute;
  top: 62px;
  transform-origin: 50%;
  z-index: -1;
  left: 15%;
  filter: blur(1px);
  animation: shadow046 .5s alternate infinite ease;
}

@keyframes shadow046 {
  0% {
    transform: scaleX(1.5);
  }

  40% {
    transform: scaleX(1);
    opacity: .7;
  }

  100% {
    transform: scaleX(.2);
    opacity: .4;
  }
}

.shadow:nth-child(4) {
  left: 45%;
  animation-delay: .2s
}

.shadow:nth-child(5) {
  left: auto;
  right: 15%;
  animation-delay: .3s;
}

</style>