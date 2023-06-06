<?php include('_header.php'); ?> 
<?php include('_sidebar.php'); 

include_once "./utils/company_name_selector.php";
require_once "./models/UserModel.php";
require_once "./models/SubscriptionModel.php";
$customers=UserModel::get_all()->fetch_all(MYSQLI_ASSOC);
$history=SubscriptionModel::get_history()->fetch_all(MYSQLI_ASSOC);
?>
        <h1 class="text-center">PAGINA ADMIN</h1>
        <br>
    <h2><b>I TUOI CLIENTI</b></h2><br>
    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0"  id="myCustomerTableBody">
      <thead>
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
    <tbody>
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
</div>
<br><br><br>
  <h2><b>STORICO ABBONAMENTI</b></h2><br>
    <!--<input class="form-control" id="myInputCustomerTable" type="text" placeholder="Cerca.."><br>-->
    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0"  id="myHistoryTableBody">
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
    <tbody>
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


</div>
</main>
</div>
</div>



<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  

<?php include('_footer.php'); ?>