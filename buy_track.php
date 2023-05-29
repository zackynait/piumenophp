<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<style>
  @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
  @import url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css');
  
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<?php

require_once "./models/TrattaModel.php";

$allcaps=TrattaModel::get_all_caps()->fetch_all(MYSQLI_ASSOC);

//echo json_encode($mysubs);
?>

<div class="row justify-content-center  m-10 p-4 ml-4 mt-0">
<div class="card container  text-center components m-10 p-4">
<form class="row p-2 needs-validation" novalidate>
          <div class="row m-2">
                <div class="col-md-3">
                <label for="validationDefault43" class="form-label">Destinazione</label>
                <select class="form-select" id="validationDefault43" required>
                  <option selected value="">Scegli...</option>
                  <option id="1">Nazionale</option>
                  <option id="2">Raccomandata</option>
                </select>
                </div>
                <div class="col-md-3">
                  <label for="validationDefault44" class="form-label">Tipo di servizio</label>
                  <select class="form-select" id="validationDefault44" required>
                  <option selected value="">Choose...</option>
                  <option id="Espresso">Espresso</option>
                  <option id="Raccomandata">Raccomandata</option>
                  <option id="Golden" >Golden</option>
                  <option id="Camionistico">Camionistico</option>
                  <option id="Road</option">Road</option>
                </select>
                </div>
            </div>

   <div class="row m-2">
    <div class="col-md-4 m-2">
    <label >Mittente</label>
    <div class="card container components m-2 ">
      <div class="row m-2">
                    <label for="validationCustom30" class="form-label">Ragione Sociale</label>
                    <input type="text" class="form-control" id="validationCustom30" value="" required>
                    
              </div>

  <div class="row m-2">
    <label for="validationCustom31" class="form-label">Indirizzo</label>
    <input type="text" class="form-control" id="validationCustom31" required>
    <div class="invalid-feedback">
      Inserisci un indirizzo valido
    </div>
  </div>

  <div class="row m-2">
    <label for="validationCustom32" class="form-label">Comune</label>
    <input type="text" class="form-control" id="validationCustom32" required>
    <div class="invalid-feedback">
    Inserisci un  valido comune
    </div>
  </div>
  <div class="row m-2">
  <label for="cap_first" class="form-label">Cap</label>
                  <select class="form-select selectpicker" data-live-search="true" id="cap_first" required>
                  <option selected value="">Choose...</option>
                  <option data-tokens="Espresso">Espresso</option>
                  <option data-tokens="Raccomandata">Raccomandata</option>
                  <option data-tokens="Golden</opt" >Golden</option>
                  <option data-tokens="Camionistico">Camionistico</option>
                  <option data-tokens="Road">Road</option>
                </select>
  </div>
  <div class="row m-2">
    <label for="validationCustom33" class="form-label">Provincia</label>
    <input type="text" class="form-control" id="validationCustom33" required>
    <div class="invalid-feedback">
    Inserisci una valida provincia 
    </div>
  </div>

  <div class="row m-2">
    <label for="validationCustom34" class="form-label">Nazione</label>
    <input type="text" class="form-control" id="validationCustom34" required>
    <div class="invalid-feedback">
    Inserisci una nazione valida
    </div>
  </div>

  <div class="row m-2">
    <label for="validationCustom35" class="form-label">Referente</label>
    <input type="text" class="form-control" id="validationCustom35" required>
    <div class="invalid-feedback">
    Inserisci un referente
    </div>
  </div>
  <div class="row m-2">
    <label for="validationCustom36" class="form-label">Mail</label>
    <input type="email" class="form-control" id="validationCustom36" required>
    <div class="invalid-feedback">
    Inserisci una mail valida
    </div>
  </div>
  <div class="row m-2">
    <label for="tel-mitt" class="form-label">telefono</label>
    <input type="tel" class="form-control" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="tel-mitt" required>
    <div class="invalid-feedback">
    Inserisci una numero di telefono valido
     </div>
  </div>
  </div>
  </div>
    <div class="col-md-4 m-2">
      <label >Destinatario</label>
      <div class="card container components m-2 ">
        <div class="row m-2">
      <label for="validationCustom01" class="form-label">Ragione Sociale</label>
      <input type="text" class="form-control" id="validationCustom01" value="" required>
    </div>
  <div class="row m-2">
    <label for="validationCustom03" class="form-label">Indirizzo</label>
    <input type="text" class="form-control" id="validationCustom02" required>
    <div class="invalid-feedback">
    Inserisci un indirizzo valido
    </div>
  </div>

  <div class="row m-2">
    <label for="validationCustom03" class="form-label">Comune</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
    Inserisci un comune valido
    </div>
  </div>
  <div class="row m-2">
  <label for="cap_dest" class="form-label">Cap</label>
                <select class="form-select selectpicker" data-live-search="true" id="cap_dest" required>
                <?php foreach($allcaps as $row) { ?>
                    <option class=<?php if ($row["Dis"]==1) echo " Dis ";else echo " "; if($row["SCS"]==1) echo " scs ";else echo " ";  ?>     id =<?=$row["id"] ?> data-tokens=<?=$row["CAP"] ?> ><?=$row["CAP"]." ".$row["Descrizione"]  ?></option>
                  <?php }?>
                
                </select>
  </div>
  <div class="row m-2">
    <label for="validationCustom03" class="form-label">Provincia</label>
    <input type="text" class="form-control" id="validationCustom04" required>
    <div class="invalid-feedback">
    Inserisci una valida provincia 
    </div>
  </div>

  <div class="row m-2">
    <label for="validationCustom03" class="form-label">Nazione</label>
    <input type="text" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
    Inserisci una nazione valida
    </div>
  </div>

  <div class="row m-2">
    <label for="validationCustom03" class="form-label">Referente</label>
    <input type="text" class="form-control" id="validationCustom06" required>
    <div class="invalid-feedback">
    Inserisci un referente
    </div>
  </div>
  <div class="row m-2">
    <label for="validationCustom03" class="form-label">Mail</label>
    <input type="email" class="form-control" id="validationCustom07" required>
    <div class="invalid-feedback">
     inserire una mail valida.
    </div>
  </div>
  <div class="row m-2">
    <label for="tel-dest" class="form-label">telefono</label>
    <input type="tel" class="form-control" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="tel-dest" required>
    <div class="invalid-feedback">
     inserire un valido numero di telefono.
    </div>
  </div>
  </div> </div>



</div>
    
  <tr>
  <div class="card container components m-2 ">
    <div class="row m-2">
  <div class="col-md-4 m-2">
    <label for="validationCustom11" class="form-label">Numero ordine</label>
    <input type="text" class="form-control" id="validationCustom11" value="">
   
  </div> 

  <div class="col-md-4 m-2">
    <label for="validationCustom12" class="form-label">DDT</label>
    <input type="text" class="form-control" id="validationCustom12" placeholder="DDT" >

  </div> 

  <div class="col-md-4 m-2">
    <label for="validationCustom13" class="form-label">Contenuto</label>
    <input type="text" class="form-control" id="validationCustom13" placeholder="Inserisci contenuto" >
    
  </div> 

  <div class="col-md-4 m-2">
    <label for="validationCustom14" class="form-label">Note</label>
    <input type="text" class="form-control" id="validationCustom14" placeholder="Note" required>
  
</div>

  <div class="col-md-4 m-2">
  <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date5">Date</label>
        <input class="form-control" id="date5" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>
  </div>
  </div>

</div>
 


  <div class="card container components m-2 ">

    <div class="row m-2">
    <div class="col-md-4 ">
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Contrassegno
  </label>
      </div></div>
      <div class="col-md-4 ">
<div class="form-check">
    <input type="number" placeholder="valore contrassegno" min=0  class="form-control w-75" id="val_assegno" >
    <label for="val_assegno" class="form-label"></label>
    <div class="invalid-feedback">
      deve essere un numero positivo
</div></div></div>
</div>



<div class="row m-2">
<div class="col-md-4">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1">
  <label class="form-check-label" for="flexCheckDefault1">
    Assicurata
  </label>
</div></div>
<div class="col-md-4 ">
<div class="form-check">
    <input type="number" placeholder="valore merce in euro" min=0 class="form-control w-75" id="val_assicurata">
    <label for="validationCustom02" class="form-label"></label>
    <div class="invalid-feedback">
      deve essere un numero positivo
    </div>
</div></div></div>


<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check ">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
  <label class="form-check-label" for="flexCheckDefault2">
    Consegna al Piano
  </label>
</div></div>
</div>

<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
  <label class="form-check-label" for="flexCheckDefault3">
    Consegna di Sabato
  </label>
</div>
</div>
</div>

<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
  <label class="form-check-label" for="flexCheckDefault4">
    Consegna di Sera
  </label>
</div>
</div>
</div>

<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
  <label class="form-check-label" for="flexCheckDefault5">
    Time Definite
  </label>
</div>
</div>
</div>

<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
  <label class="form-check-label" for="flexCheckDefault6">
    Consegna su appuntamento
  </label>
</div>
</div>
</div>

<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
  <label class="form-check-label" for="flexCheckDefault7">
  Consegna programmata
  </label>
</div>
</div>
</div>

<div class="row m-2">
<div class="col-md-4 ">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
  <label class="form-check-label" for="flexCheckDefault8">
  Sponda Idraulica
  </label>
</div>
</div>
</div>

</div>


<div class="card container scelta  m-2 mr-4">
  <div class="row">
    <div class="col-md-2 m-2">
    <label for="coll" class="form-label"> N. Colli:*</label>
  </div>
  <div class="col-md-2 m-2">
    <input type="number" class="form-control w-50" id="ncoll" value="1" min=0 required>
                <div class="invalid-feedback">
                  deve essere un numero positivo
                </div>
    </div>
        <div class="col-md-2 m-2">
          <button type="button" placeholder="Esegui" class="btn btn-outline-primary" onclick="add_item($('#ncoll'))">Esegui</button>
        </div>
  </div>
</div>
<br><br>

<div class="card container products m-2" id="products">
 
</div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Crea Preventivo</button>
  </div>
</form>

</div>
          <div class="card container components m-2 ">
          <div class="row m-2">
          <div id="response" class="container m-2  hidden ">
          <table class="table m-2 ">
            <thead class="thead-light m-2 ">
              <tr>
                <th scope="col m-2 ">prodotto</th>
                <th scope="col m-2 ">Costo</th>  
              </tr>
            </thead>
            <tbody id="recap1">

            </tbody>
          </table>


          </div>
          </div></div>






<!-- Button trigger modal -->
<button type="button" id="show_error" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:none;" >
  errors
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Errori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="error_resume" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">chiudi</button>
      </div>
    </div>
  </div>
</div>




</div>






<script> 

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
 
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        var rec = document.getElementById("recap1");
        $("#response").addClass("hidden");
        rec.innerHtml="";
           event.preventDefault();
          event.stopPropagation() ;
          var totale_pagamento=0.00;
          var message_error="";
          var peso_vol=0;
          var index = 0;
          var tot_kg_vol=0;
          console.log( $("#cap_dest"));
          console.log( $("#cap_dest"));
          console.log( $("#cap_dest").val());
          var contrassegno_checked=$("#flexCheckDefault").is(":checked");
          var assicurata_checked=$("#flexCheckDefault1").is(":checked");
          console.log(contrassegno_checked);
          var rows = document.querySelectorAll('.row_products')
                 rows.forEach(function (p) {
                                            index++;
                                          var t=$(p);
                                          var peso_effettivo=0;
                                          var kg=  t.find('.kg').val();
                                          var l1=t.find('.l1').val();
                                          var l2=t.find('.l2').val();
                                          var l3=t.find('.l3').val();
                                          var indice=5000;
                                        peso_vol=(l1 * l2 * l3)/indice;
                                        if(kg<0.1)
                                        {
                                          t.find('.kg').addClass("not-validated"); 
                                          message_error+="<p>riga n "+String(index)+" il peso minimo è 0,1 kg\n</p>"
                                        }
                                        if(kg>25)
                                        {
                                          t.find('.kg').addClass("not-validated"); 
                                          message_error+="<p>riga n "+String(index)+" il peso reale è sopra i 25 kg, dovrà essere allocato su un bancale\n</p>"
                                        }
                                        if (peso_effettivo<kg)
                                        { peso_effettivo=kg;
                                         } else {
                                          peso_effettivo=peso_vol;

                                        }
                                        tot_kg_vol+=peso_effettivo;
                                        console.log("kg,pe",kg,peso_effettivo);
                                        console.log(peso_vol);
                                       
                                        if(l1<1)
                                        {
                                          t.find('.l1').addClass("not-validated"); 
                                          message_error+="<p>riga n "+String(index)+" il primo lato deve essere minimo 1 cm\n</p>"
                                        }
                                        if(l2<1)
                                        {
                                          t.find('.l2').addClass("not-validated"); 
                                          message_error+="<p>riga n "+String(index)+" il secondo lato deve essere minimo 1 cm\n</p>"
                                        }
                                        if(l3<1)
                                        {
                                          t.find('.l3').addClass("not-validated"); 
                                          message_error+="<p>riga n "+String(index)+" il terzo lato deve essere minimo 1 cm\n</p>"
                                        }
                                        if(peso_effettivo>99.9 && typeof peso_effettivo == 'number')
                                        {
                                          console.log("pe",peso_effettivo);
                                          t.find('.kg').addClass("not-validated"); 
                                          message_error+="<p>riga n "+String(index)+" il peso supera i 100 kg volumetrici, contatta l'assistenza\n</p>";
                                        }
                                        var prep_l1=parseInt(l1);
                                        var prep_l2=parseInt(l2);
                                        var prep_l3=parseInt(l3);
                                        var tot_row=prep_l1+prep_l2+prep_l3;
                                                  if (tot_row>130)
                                                  {
                                                    message_error+="riga n "+String(index)+" il pacco supera il limite di lunghezza totale di 130 cm\n";
                                                  }
                                          });
                          
        var rec = document.getElementById("recap1");
        rec.innerHTML="";
        console.log(rec);                              
          if(assicurata_checked)
          {
            var val_assicurata = document.getElementById("val_assicurata").value;
            console.log(val_assicurata);
             if(val_assicurata>10000)
              {
              message_error+="<p>il valore della merce assicurata non puo essere maggiore di 10000€\n</p>";
             
             }
             if(val_assicurata<1 || val_assicurata=="" )
              {
              message_error+="<p>inserisci un valore valido per la merce assicurata\n</p>";
              
             }
             let threshold_assic=8;
             var perc_assic=(1.5*val_assicurata)/100;
             var tot_assic=perc_assic;
             if(perc_assic<threshold_assic)  tot_assic=threshold_assic;
             totale_pagamento+=tot_assic;
             rec.innerHTML+="<tr><th scope='row'>assicurazione</th><td>"+String(tot_assic)+" €</td> </tr>";
          }
          console.log(message_error);
          if(message_error.length>0)
          {
            console.log(message_error);
            //message_error+="<p>per maggiori informazioni, contatta l'assistenza\n</p>"
            $("#error_resume").empty();
            $("#error_resume").html(message_error);
            $("#show_error").click();
            //return;
          }   
        console.log("controlling..");
        var tot_assegno=0;
        if(contrassegno_checked)
          {
            let cost_assegno=8.5;
            var val_assegno = document.getElementById("val_assegno").value;
            console.log(val_assegno);
             if(val_assegno>517)
              {
                tot_assegno=(cost_assegno+(((val_assegno-517)*3.5)/100)).toFixed(2);
                console.log("as",tot_assegno);
             }else{
              tot_assegno=cost_assegno;
             }
             console.log(tot_assegno);
             totale_pagamento+=tot_assegno;
             rec.innerHTML+="<tr><th scope='row'>contrassegno</th><td>"+String(tot_assegno)+" €</td> </tr>";
          }
          if(assicurata_checked)
          {
            var val_assicurata = document.getElementById("val_assicurata").value;
            console.log(val_assicurata);
             if(val_assicurata>10000)
              {
              message_error+="<p>il valore della merce assicurata non puo essere maggiore di 10000€\n</p>";
             }
             let threshold_assic=8;
             var perc_assic=(1.5*val_assicurata)/100;
             var tot_assic=perc_assic;
             if(perc_assic<threshold_assic)  tot_assic=threshold_assic;
             totale_pagamento+=tot_assic;
             rec.innerHTML+="<tr><th scope='row'>assicurazione</th><td>"+String(tot_assic)+" €</td> </tr>";
          }
          if(message_error.length>0)
          {
            console.log(message_error);
            //message_error+="<p>per maggiori informazioni, contatta l'assistenza\n</p>"
            $("#error_resume").empty();
            $("#error_resume").html(message_error);
            $("#show_error").click();
            return;
          }   


            if(totale_pagamento>0)
            {
        
              rec.innerHTML+="<tr><th scope='row'>TOTALE</th><td>"+Number(totale_pagamento).toString()+" €</td> </tr>";//RIGA PER PAGARE
              $("#response").removeClass("hidden");
            }

       // }

        form.classList.add('was-validated')
      
       

    
       
      }, false)
    })


})()



 $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

  function add_item(n) 
  {
    console.log(n);
    console.log(n.val());
    var x = document.getElementById("products");
    x.innerHTML="";
   if ($.isNumeric(n.val()))
   {

    x.innerHTML +='<div class="row m-2"><div class="col-md-2">\
  <label>kg</label></div><div class="col-md-2"> \
  <label>altezza</label></div><div class="col-md-2"> \
  <label>larghezza</label></div><div class="col-md-2"> \
  <label>lunghezza</label>\
</div></div>';

// This function will figure out which tab to display
for (let i = 0; i < n.val(); i++) {
  console.log("adding....");
  x.innerHTML +='<div class="row form-group row_products m-2"><div class="col-md-2">\
  <input type="number"  placeholder="kg" class="form-control kg prod-dim col-xs-2" min=0 id="validationCustom0766" required>\
  </div><div class="col-md-2"> <input type="number"  placeholder="lato(cm)" class="form-control l1 prod-dim col-xs-2" id="validationCustom099" min=0  required>\
  </div><div class="col-md-2">  <input type="number"  placeholder="lato(cm)" class="form-control l2 prod-dim col-xs-2" id="validationCustom096" min=0  required>\
  </div><div class="col-md-2">  <input type="number"  placeholder="lato(cm)" class="form-control l3 prod-dim col-xs-2" id="validationCustom076" min=0  required>\
  </div><div class="col-md-2">  <button type="button" class="btn btn-outline-danger" onclick="deleterow($(this))">\
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path> </svg>\
  </button>  </div></div></div>';
  }
}

}
function deleterow(o) 
{
  console.log (o);
  o.parent().parent().remove();
}

$('.prod-dim').on("input",function(e) {
  var p=$(this).parent();
  var l1=p.find('.l1').val();
  var l2=p.find('.l2').val();
  var l3=p.find('.l3').val();

  // somma troppo
  var prep_l1=parseInt(l1);
  var prep_l2=parseInt(l2);
  var prep_l3=parseInt(l3);
  var tot_row=prep_l1+prep_l2+prep_l3;

if (tot_row>130)
{
$('.pop-val-troppo').click();
}

});




</script>

<style>.hidden
{
   display: none
}
  </style>