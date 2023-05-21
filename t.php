<?php if (session_status() === PHP_SESSION_NONE) {session_start();} ?>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/neomo@2.1.0/dist/neomo.min.css"rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/neomo@2.1.0/dist/neomo.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

    <!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
<?php
// <button type="button" id="btn-secondary" class="btn btn-lg btn-secondary" data-toggle="popover" title="sottoscrizione nuovo abbonamento" data-content="il tipo di voucher non rientra nel suo contratto stipulato,se accetta, riceverà il contratto con le nuove modifiche direttamente a casa. per ulteriori informazioni ci contatti telefonicamente">?</button>
require_once "./models/VoucherModel.php";
require_once "./models/SubscriptionModel.php";
require_once "./models/WeightsModel.php";
include "./reserved-navbar.php";
include_once "./utils/company_name_selector.php";
$vouchers=VoucherModel::get_all()->fetch_all(MYSQLI_ASSOC);
$subscriptions=SubscriptionModel::get_all()->fetch_all(MYSQLI_ASSOC);
$weights=WeightsModel::get_all()->fetch_all(MYSQLI_ASSOC);
//$mysubs=SubscriptionModel::get_my_voucher( $_SESSION['id'])->fetch_all(MYSQLI_ASSOC);//in base all'utente-- if problem mandalo su un'altra pagina stampa id 


/*echo json_encode($mysubs);
//$allhisub=[];
foreach($mysubs  as $sub)
{
    array_push($allhisub,$sub["Tipo_di_abbonamento"]);
}//value	validexpire_datetext	descr	status  start	    end	    measure
//$allhisub=array_unique($allhisub);
//$allhisub=array_values($allhisub);
//echo json_encode($allhisub);*/
?>
<div class="h-screen flex-grow-1 overflow-y-lg-auto">
<main class="py-6 bg-surface-secondary">
<div class="container main">
    <!-- Card stats -->
    <div class="row justify-content-center mt-0">
    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Spedisci in Italia con Cityex!</strong></h2>
                <div class="row">
                
      <hr/>

        <form class="needs-validation" >

        <div class="container inputs">
            <div class="columns text-center">
                            <div class="column box">
                               <label class="form-check-label" for="invalidCheck">contrassegno </label>
                            </div>
                            <div class="column box">
                            <div class="checkbox-apple"> <input class="yep " id="check-apple" type="checkbox" onclick="recap(2)"> <label class="label-contract" for="check-apple"></label></div>
                            </div>                       
            </div>                
                    
                    <hr/>
  
<br><br>



            <div class="container scelta">

            <div class="input-group scelta outset-neomo">
                                <input type="text" class="input-group-left outset-neomo"
                placeholder="Collo"  onclick="add_item(0)"
              />
              <input
                type="text"
                class="input-group-right outset-neomo"
                placeholder="Bancale" onclick="add_item(1)"
              />
            </div>
            </div>
<br><br>


<div class="flex-container products" id="products">
    <div class="input-group outset-neomo">
                    <input
    type="text"
    class="input-group-left peso prod-dim outset-neomo"
    placeholder="kg"
  />
  <input
    type="text"
    class="input-group-left l1 prod-dim outset-neomo"
    placeholder="lato(cm)"
  />
  <input
    type="text"
    class="input-group-center l2 prod-dim outset-neomo"
    placeholder="lato(cm)"
  />
  <input
    type="text"
    class="input-group-right l3 prod-dim outset-neomo"
    placeholder="lato(cm)"
  />
  <button type="button" class="btn btn-outline-danger" onclick="deleterow(this)">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path> </svg>
              </button> 
</div>



</div>



        </div>


        <div class="container"><button class="button outset-neomo m-10 submit" onclick="all_validation()">Richiedi preventivo</button> </div>
        </form>

                </div>  


    </div>  </div>   </div> 

</div>  
<div class="container riepilogo" id="riepilogo"></div>
<button data-modal-id="modal1" class="modal-button pop-val-troppo outset-neomo">popup: attenzione</button>
<div data-modal-id="modal1" class="modal">
  <div class="modal-content--md outset-neomo">
    <span class="modal-close">&times;</span>
    <p>attenzione! il prodotto supera la lunghezza totale di 130 cm.si prega di contattare l'assistenza. </p>
  </div>
</div>
<div class="container" id="paymentResponse"></div>

</main> 
</div>
</div>



<script>
 $('.pop-val-troppo').hide();
function recap(x){

console.log($("input[id='check-apple']").is(":checked"));

}



function add_item(n) {
  // This function will figure out which tab to display
  var x = document.getElementById("products");
  x.innerHTML +=
            '<div class="row">\
                                    <div class="col"> <input type="text" placeholder="peso" class="form-control">  </div>\
                                    <div class="col">  <input type="text" placeholder="lato1" class="form-control">  </div>\
                                    <div class="col">  <input type="text" placeholder="lato2" class="form-control">  </div>\
                                    <div class="col"> <input type="text" placeholder="lato3" class="form-control">  </div>\
                                    <div class="col"> <button type="button" class="btn btn-outline-danger" onclick="deleterow(this)">\
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path> </svg>\
              </button> </div>';
}

function deleterow(o) 
{
    $(this).parent().remove();
}

$('.prod-dim').on("input",function(e) {
  var p=$(this).parent();
  var l1=p.find('.l1').val();
  var l2=p.find('.l2').val();
  var l3=p.find('.l3').val();

  //numerici
  console.log ( $.isNumeric(l1));

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




  var  cqr={};//  <button class="btn btn-primary" class="submit" type="submit" onclick="all_validation()">fai preventivo</button>
  var ab_name="";
// Example starter JavaScript for disabling form submissions if there are invalid fields



function all_validation(){
  event.preventDefault();
  event.stopPropagation();
  //console.log(cqr);

  a=$("input[name='sortType']:checked").val();
  b=$("input[name='qty']:checked").val();
accepted=$("input[id='check-apple']").is(":checked");
var validation=true;
if (a==undefined || a==null)
{
$(".abbonaments").addClass("not_valid");
validation=false;
}
if (b==undefined || b==null)
{
$(".qty").addClass("not_valid");
validation=false;
}

if (Object.keys(cqr).length === 0 && accepted==false)
{
console.log("accetta");
  $(".label-contract").addClass("not_valid");
  validation=false;
}


if (validation)
{
console.log("calculating");
console.log(cqr);
//print costo e bottone stripe
$("#preventivo").remove();
$(".main").append('<div id=\"preventivo\" class=\"col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2\">\
            <div class=\"card\">\
            <table class=\"table outset-neomo\">\
  <thead> <tr>   <th>numero di lettere di vettura </th>  <th>Costo per lettera di vettura</th>  <th>Costo imponibile Carnet</th> <th>Diritto Fisso imponibile</th>    <th>Costo carnet totale iva inclusa</th> <th></th>  </tr> </thead>\
  <tbody>    <tr> <td class=\"qta\">'+cqr["Quantita_lettere_di_vettura"]+'</td>   <td>'+cqr["Costo per lettera di vettura"]+'€</td> <td>'+cqr["Costo imponibile Carnet"]+' €</td><td>'+cqr["Diritto Fisso imponibile"]+' €</td><td class=\"price\">'+cqr["Costo carnet totale iva inclusa"]+' €</td> <td><button onclick="paying()" class=\"outset-neomo m-10\"  id=\"payButton\">Acquista Ora</button></td>   </tr> </tbody></table>\
          </div>   </div> '
)
console.log("appeso");
}

}

function deleterow(o) {
var p=o.parentNode.parentNode.parentNode;
//console.log(p);
console.log(o.parentNode)
p.removeChild(o.parentNode);
}


//dropdown
$('.dropdown-el').click(function(e) {
  var found=false;
  e.preventDefault();
  e.stopPropagation();
  $(this).toggleClass('expanded');
  //console.log($(e.target));
  //console.log($("input[id='check-apple']").is(":checked"));
  //console.log("ciao");
  if ($('#'+$(e.target).attr('for')).is(":checked")==false)
    {
        
      $(".contract-check").hide(); 
  $('#'+$(e.target).attr('for')).prop('checked',true);
  a=$("input[name='sortType']:checked").val();
  b=$("input[name='qty']:checked").val();
  cqr={};
  var subs=""    //<?php// echo json_encode($mysubs)?>;
  if (a!=null && b!=null)
  {
            $.each(subs, function(index,value ) {
              if(value["Tipo_di_abbonamento"]==a && value["Quantita_lettere_di_vettura"]==b)
              {          
              if (found==false)
                          {
                          $(".contract-check").hide();
                          found=true;
                          cqr=value;
                          ab_name=$("input[name='sortType']:checked").attr("id");
                          console.log($("input[name='sortType']:checked").attr("id"));
                          } 
              } 
            });   
            
            if (found==false)
                          {
                            $(".contract-check").show();
                            ab_name="";
                          }


  }
}
});
$(document).click(function(e) {
 
 
  $('.dropdown-el').removeClass('expanded');
  if($('.submit')[0]!=e.target)
  {
    $('.not_valid').removeClass('not_valid');
  }
  });

//stripe
function paying(){
//$('body').on('click', ".payButton",function(e) {
  console.log("clicked on paying");
var responseContainer = document.getElementById('paymentResponse');    
// Create a Checkout Session with the selected product
var createCheckoutSession = function (stripe) {
    console.log("sta per checkout");
    var price=cqr["Costo carnet totale iva inclusa"];
    var qta=cqr["Quantita_lettere_di_vettura"];
    var name_ab= qta+ " lettere di vettura  di tipo " +ab_name+" ";
    
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
			Name: name_ab,
			ID:cqr["id"],
			Price:price,
			Currency:"EUR",
        }),
    }).then(function (result) {
        console.log("ret checkout s");
        console.log(result);
        return result.json();
    });
};

// Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    $(this).disabled = false;
    $(this).textContent = 'Acquista';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');


  $(this).disabled = true;
  $(this).textContent = 'Attendi...';
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });




//});

}
</script>




<style>
.needs-validation{
    padding:3%;
    margin:3%;
    }
    
option{
    padding:2px;
    box-shadow:5px 5px 5px lightgray inset,-5px -5px 5px white inset;
    border-radius:3px;
}
.card{
   background: linear-gradient(145deg, #ffffff, #dde1e3);
box-shadow:  20px 20px 39px #b6b9ba,
             -20px -20px 39px #ffffff;
   /* box-shadow: inset 0 0 15px rgba(55, 84, 170, 0), inset 0 0 20px rgba(255, 255, 255, 0), 7px 7px 15px rgba(55, 84, 170, .15), -7px -7px 20px rgba(255, 255, 255, 1), inset 0px 0px 4px rgba(255, 255, 255, .2);
	 -webkit-touch-callout: none;*/
}

.dropdown-el {
	 margin-top: 0;
	 min-width: 12em;
	 position: relative;
	 display: inline-block;
	 margin-right: 1em;
	 min-height: 2em;
	 max-height: 2em;
	 overflow: hidden;
	 top: 0.5em;
	 cursor: pointer;
	 text-align: left;
	 white-space: nowrap;
	 color: #444;
	 outline: none;
	 border: 0.06em solid transparent;
	 border-radius: 1em;
	 background-color: transparent;
	 transition: 0.7s all ease-in-out;
   box-shadow:  inset 2px 2px 2px #d3d3d3,
            inset -2px -2px 2px #ededed
}
 .dropdown-el input:focus + label {
	 background: #def;
}
 .dropdown-el input {
	 width: 1px;
	 height: 1px;
	 display: inline-block;
	 position: absolute;
	 opacity: 0.01;
}
 .dropdown-el label {
	 border-top: 0.06em solid #d9d9d9;
	 display: block;
	 height: 2em;
	 line-height: 2em;
	 padding-left: 1em;
	 padding-right: 3em;
	 cursor: pointer;
	 position: relative;
	 transition: 0.5s color ease-in-out;
}
 .dropdown-el label:nth-child(2) {
	 margin-top: 2em;
	 border-top: 0.06em solid #d9d9d9;
}
 .dropdown-el input:checked + label {
	 display: block;
	 border-top: none;
	 position: absolute;
	 top: 0;
	 width: 100%;
}
 .dropdown-el input:checked + label:nth-child(2) {
	 margin-top: 0;
	 position: relative;
   
}
 .dropdown-el::after {
	 content: "";
	 position: absolute;
	 right: 0.8em;
	 top: 0.9em;
	 border: 0.3em solid #3694d7;
	 border-color: #3694d7 transparent transparent transparent;
	 transition: 0.5s all ease-in-out;
}
 .dropdown-el.expanded {
	 border: 0.06em solid #3694d7;
	 background: #fff;
	 border-radius: 0.25em;
	 padding: 0;
	 box-shadow: rgba(0, 0, 0, 0.1) 3px 3px 5px 0px;
	 max-height: 15em;
}
 .dropdown-el.expanded label {
	 border-top: 0.06em solid #d9d9d9;
}
 .dropdown-el.expanded label:hover {
	 color: #3694d7;
}
 .dropdown-el.expanded input:checked + label {
	 color: #3694d7;
}
 .dropdown-el.expanded::after {
	 transform: rotate(-180deg);
	 top: 0.55em;
}
 




.input-group-left,.input-group-center,.input-group-right{
  max-width:90px;
}

.scelta{
  max-width:250px;
}

.input-group{
  max-width:420px;
}
.delete
{
  max-width:40px;

}



.checkbox-apple {
  position: relative;
  width: 50px;
  height: 25px;
  margin: 20px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
}

.checkbox-apple label {
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 25px;
  border-radius: 50px;
  background: linear-gradient(to bottom, #b3b3b3, #e6e6e6);
  cursor: pointer;
  transition: all 0.3s ease;
}

.checkbox-apple label:after {
  content: '';
  position: absolute;
  top: 0px;
  left: 0px;
  width: 23px;
  height: 23px;
  border-radius: 50%;
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  transition: all 0.3s ease;
}

.checkbox-apple input[type="checkbox"]:checked + label {
  background: linear-gradient(to bottom,#002D62, #3457D5);
}

.checkbox-apple input[type="checkbox"]:checked + label:after {
  transform: translateX(25px);
}

.checkbox-apple label:hover {
  background: linear-gradient(to bottom, #b3b3b3, #e6e6e6);
}

.checkbox-apple label:hover:after {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.yep {
  position: absolute;
  top: 0;
  left: 0;
  width: 50px;
  height: 25px;
  
}
.not_valid {
  border: solid;
  border-color:red;

}



  </style>

