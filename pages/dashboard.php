<?php if (session_status() === PHP_SESSION_NONE) {session_start();} ?>
<?php include('../_header.php'); ?>
<?php include('../_sidebar.php'); ?>
<?php

include_once "../utils/company_name_selector.php";
require_once "../models/UserModel.php";
require_once "../models/SubscriptionModel.php";
$customers=UserModel::get_all()->fetch_all(MYSQLI_ASSOC);
$history=SubscriptionModel::get_history()->fetch_all(MYSQLI_ASSOC);
$orders=UserModel::get_orders($_SESSION['id'])->fetch_all(MYSQLI_ASSOC);
$av_vouchers=UserModel::get_vouchers($_SESSION['id'])->fetch_all(MYSQLI_ASSOC);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"></script>


    <h2><b>LE TUE TRANSAZIONI</b></h2><br>
    <div class="table-responsive">
   <table id="myCustomerTable" class="table table-bordered table-striped"> 
    <thead>
      <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Codice Articolo</th>
          <th>quantità</th>
          <th>Totale</th>
          <th>Valuta</th>
          <th>codice transazione</th>
          <th>stato pagamento</th>
          <th>data ora</th>
      </tr>
    </thead>
    <tbody id="myCustomerTableBody">
    <?php foreach($orders as $row) { ?>
      <tr>
      <td><?=$row["name"] ?></td>
      <td><?=$row["email"] ?></td>
      <td><?=$row["item_name"] ?></td>
      <td><?=$row["item_price"] ?></td>
      <td><?=$row["paid_amount"] ?></td>
      <td><?=$row["paid_amount_currency"] ?></td>
      <td><?=$row["txn_id"] ?></td>
      <td><?=$row["payment_status"] ?></td>
      <td><?=$row["created"] ?></td>

      </tr>
    <?php }?>
    </tbody>
  </table>
  </div>
<br><br><br>
  <h2><b>voucher disponibili</b></h2><br>
    <!--<input class="form-control" id="myInputCustomerTable" type="text" placeholder="Cerca.."><br>-->
    <div class="table-responsive">
   <table id="myHistoryTable" class="table table-bordered table-striped"> 
    <thead>
      <tr>
          <th>Tipo_di_abbonamento</th>
           <th>Quantità disponibile</th>
          <th>Data aggiornamento.</th>
      </tr>
    </thead>
    <tbody id="myHistoryTableBody">
    <?php foreach($av_vouchers as $row) { ?>
      <tr>
      <td><?=$row["quantity"] ?></td>
      <td><?=$row["Subscription_id"] ?></td>
      <td><?=$row["timestamp"] ?></td>
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