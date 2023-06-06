<?php if (session_status() === PHP_SESSION_NONE) {session_start();} ?>
<?php include('../_header.php'); ?>
<?php include('../_sidebar.php'); ?>
<?php


include_once "../utils/company_name_selector.php";
require_once "../models/UserModel.php";
require_once "../models/SubscriptionModel.php";
$customers=UserModel::get_all()->fetch_all(MYSQLI_ASSOC);
$history=SubscriptionModel::get_history()->fetch_all(MYSQLI_ASSOC);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"></script>


    <h2><b>I TUOI CLIENTI</b></h2><br>
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
  <h2><b>STORICO ABBONAMENTI</b></h2><br>
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
      <td><?=$row["Quantita' lettere di vettura"] ?></td>
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
  
 // $('.dataTables_length').addClass('bs-select');
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

h1 {
  font-size: 70px;
  font-weight: 600;
  background-image: linear-gradient(to left, #553c9a, #b393d3);
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
}

h2 {
  font-family: Georgia;
  font-size: 40px;
  font-weight: 400;
  background-image: linear-gradient(to left, #7FFFD4, #00008B);
  color: transparent;
  background-clip: text;
  -webkit-background-clip: text;
}
</style>