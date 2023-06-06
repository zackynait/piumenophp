<?php if (session_status() === PHP_SESSION_NONE) {session_start();} ?>
<?php include('../_header.php'); ?>
<?php include('../_sidebar.php'); ?>

<script src="https://js.stripe.com/v3/"></script>
<?php
require_once "../models/VoucherModel.php";
require_once "../models/SubscriptionModel.php";
require_once "../models/WeightsModel.php";

$vouchers=VoucherModel::get_all()->fetch_all(MYSQLI_ASSOC);
$subscriptions=SubscriptionModel::get_all()->fetch_all(MYSQLI_ASSOC);
$weights=WeightsModel::get_all()->fetch_all(MYSQLI_ASSOC);
$mysubs=SubscriptionModel::get_my_voucher( $_SESSION['id'])->fetch_all(MYSQLI_ASSOC);
?>

<div class="multisteps-form">
  <!--progress bar-->
  <div class="row">
    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
      <div class="multisteps-form__progress">
        <button class="multisteps-form__progress-btn js-active" type="button" title="Voucher selection">Voucher</button>
        <button class="multisteps-form__progress-btn" type="button" title="Pagamento">Pagamento</button>
      </div>
    </div>
  </div>
  <!--form panels-->
  <div class="row">
    <div class="col-12 col-lg-8 m-auto">
      <form class="multisteps-form__form">
        <!--single form panel-->
        <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
          <h3 class="multisteps-form__title">Voucher</h3>
          <div class="multisteps-form__content">
            <div class="form-row mt-4">
                <div class="col-12 col-sm-6 multisteps-form__input form-control">
                <select class="form-select package" aria-label="Default select example" required>
                  <option selected>Seleziona tipologia contratto</option>
                  <option  name="sortType" class="multisteps-form__input form-control" value="20" id="paccopiu"  >paccopiu</option>
                  <option name="sortType"  class="multisteps-form__input form-control" value="30" id="nazionale" >nazionale</option>
                  <option name="sortType"  class="multisteps-form__input form-control" value="32" id="moto"  >moto</option>
                </select>
            </div>
            <div class="form-row mt-4">
               <div class="col-12 col-sm-6 multisteps-form__input form-control">
                 <select class="form-select quantity" aria-label="Default select example" required>
                   <option selected>Seleziona quantità</option>
                   <option  name="qty" value="10" class="multisteps-form__input form-control" id="sort-best1"><label for="sort-best1">10</label>
                   <option  name="qty" value="25" class="multisteps-form__input form-control" id="sort-best2"><label for="sort-best2">25</label>
                   <option  name="qty" value="50" class="multisteps-form__input form-control" id="sort-low1"><label for="sort-low1">50</label>
                </select>
          </div>
          </div>
            <div class="form-row mt-4 contract-check hide">
                <div class="col-12 col-sm-6 multisteps-form__input form-control">
                        <div class="container py-6 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="checkbox-exception">
                                    </div>
                                </div>
                                <div class="ms-4">
                                  <span class="text-xs d-block">accetto termini e condizioni</span>
                                </div>
                         </div>
                        </div>
                 </div>
            </div>
            <div class="button-row d-flex mt-4">
              <button class="btn btn-primary ml-auto js-btn-next" type="button"  onclick="all_validation(event)" title="Next">Next</button>
            </div>
          </div>
        </div>
    </div>
       <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
        <h3 class="multisteps-form__title">Riepilogo</h3>
          <div class="multisteps-form__content">
            <div class="form-row mt-4">
                <div class="main">

                </div>
            </div>
          </div>
        </div>

      </form>
     </div>
  </div>
</div>

<?php include('../_footer.php'); ?>

<script src = "../assets/js/core/multiform.js"></script>


<script>

$('select').click(function(e) {
console.log(e);
    var found=false;
    e.preventDefault();
    e.stopPropagation();
    a=$(".package").val();
    b=$(".quantity").val();
    console.log("select");
  console.log(a);
  console.log(b);
  cqr={};
  var subs=<?php echo json_encode($mysubs)?>;
  if (a!=null && b!=null && a!="Seleziona tipologia contratto" && b!="Seleziona quantità")
  {
            $.each(subs, function(index,value )
            {
              if(value["Tipo_di_abbonamento"]==a && value["Quantita_lettere_di_vettura"]==b)
              {
              if (found==false)
                {
                $(".contract-check").addClass("hide");
                $(".contract-check").removeClass("show");
                found=true;
                cqr=value;
                ab_name=$(".package").children(":selected").attr("id");
                console.log("found ");
                }
              }
            });
            if (found==false){$(".contract-check").removeClass("hide");  $(".contract-check").addClass("show"); }
            else{ $(".contract-check").addClass("hide");$(".contract-check").removeClass("show");  } }
});
</script>

<script>

function all_validation(e){
console.log(e);
  var validation=true;
  var sel_a=$(".package");
  var sel_b=$(".quantity");
  var a=$("option[name='sortType']:checked").val();
  var b=$("option[name='qty']:checked").val();
  sel_a.removeClass("is-invalid");
  sel_a.removeClass("is-valid");
  sel_b.removeClass("is-invalid");
  sel_b.removeClass("is-valid");
   console.log("validation");
   console.log(a);
   console.log(b);
   var  accepted=$("input[id='checkbox-exception']").is(":checked");

            if (a==undefined || a==null || a=="Seleziona tipologia contratto" )
            {
            sel_a.addClass("is-invalid");
            validation=false;
            }else
            { sel_a.addClass("is-valid");
            }
            if (b==undefined || b==null || b=="Seleziona quantità")
            {
             sel_b.addClass("is-invalid");
            validation=false;
            }else{
             sel_b.addClass("is-valid");
            }
            if (validation==false){
            e.preventDefault();
            e.stopPropagation();
            return;
            }
            if (Object.keys(cqr).length === 0 && accepted==false)
            {
            console.log("deve accettare");
              $(".label-contract").addClass("is-invalid");
              validation=false;
            }
            if (validation)
            {
            console.log("calculating");
            console.log(cqr);
            //print costo e bottone stripe
            $("#preventivo").remove();

            $(".main").append(         '<div id=\"preventivo\"> <div class=\"form-group\">\
                            <label class=\"form-control-label\" for=\"nldv">numero di lettere di vettura</label>\
                            <div class=\"input-group\"> <input type=\"text\" class=\"form-control\" id=\"nldv\" disabled value='+cqr["Quantita_lettere_di_vettura"]+'></div>\
                        </div>\
                        <div class=\"form-group disabled\">\
                            <label class=\"form-control-label\" for="cldv">Costo per lettera di vettura(euro)</label>\
                            <div class=\"input-group disabled\"> <input type="text" class="form-control" id="cldv" disabled value='+cqr["Costo per lettera di vettura"]+'€></div>\
                        </div>\
                           <div class=\"form-group\">\
                            <label class=\"form-control-label\" for=\"cic\">Costo imponibile Carnet(euro)</label>\
                            <div class=\"input-group\"> <input type=\"text\" class="form-control" id="cic" disabled value='+cqr["Costo imponibile Carnet"]+'€></div>\
                        </div>\
                          <div class=\"form-group\">\
                            <label class=\"form-control-label\" for=\"dfi\">Diritto Fisso imponibile(euro)</label>\
                            <div class=\"input-group\"> <input type="text" class="form-control" id="dfi" disabled value='+cqr["Diritto Fisso imponibile"]+'€></div>\
                        </div>\
                          <div class=\"form-group\">\
                            <label class=\"form-control-label\" for=\"cciva\">Costo carnet totale iva inclusa(euro)</label>\
                            <div class=\"input-group\"> <input type=\"text\" class=\"form-control\" id=\"cciva\" disabled value='+cqr["Costo carnet totale iva inclusa"]+'€></div>\
                        </div> \
                          <div class=\"button-row d-flex mt-4\">\
                                <button onclick=\"paying()\"  class=\"btn btn-primary ml-auto js-btn-next\"  type=\"button\"  title=\"Acquista Ora\"  id=\"payButton\">Acquista Ora</button>\
                            </div>\
                        </div>'
                        );
            console.log("appeso");
            }else
            {
             e.preventDefault();
             e.stopPropagation();
           }
}
</script>

<script>
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

    return fetch("../stripe_charge.php", {
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


}
</script>






<style>
.hide{
display: none;
}
.show{
display: block;
}
</style>


<style>
.multisteps-form__progress {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
}
.multisteps-form__progress-btn {
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  position: relative;
  padding-top: 20px;
  color: rgba(108, 117, 125, 0.7);
  text-indent: -9999px;
  border: none;
  background-color: transparent;
  outline: none !important;
  cursor: pointer;
}
@media (min-width: 500px) {
  .multisteps-form__progress-btn {
    text-indent: 0;
  }
}
.multisteps-form__progress-btn:before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 13px;
  height: 13px;
  content: '';
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  border: 2px solid currentColor;
  border-radius: 50%;
  background-color: #fff;
  box-sizing: border-box;
  z-index: 3;
}
.multisteps-form__progress-btn:after {
  position: absolute;
  top: 5px;
  left: calc(-50% - 13px / 2);
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  display: block;
  width: 100%;
  height: 2px;
  content: '';
  background-color: currentColor;
  z-index: 1;
}
.multisteps-form__progress-btn:first-child:after {
  display: none;
}
.multisteps-form__progress-btn.js-active {
  color: #007bff;
}
.multisteps-form__progress-btn.js-active:before {
  -webkit-transform: translateX(-50%) scale(1.2);
          transform: translateX(-50%) scale(1.2);
  background-color: currentColor;
}
.multisteps-form__form {
  position: relative;
}
.multisteps-form__panel {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  opacity: 0;
  visibility: hidden;
}
.multisteps-form__panel.js-active {
  height: auto;
  opacity: 1;
  visibility: visible;
}
</style>