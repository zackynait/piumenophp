

<?php

if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
 
}?>
<link rel="stylesheet" href="wizard.css">
    <!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
<?php

require_once "./models/VoucherModel.php";
require_once "./models/SubscriptionModel.php";
require_once "./models/WeightsModel.php";
include "./reserved-navbar.php";
include_once "./utils/company_name_selector.php";
$vouchers=VoucherModel::get_all()->fetch_all(MYSQLI_ASSOC);
$subscriptions=SubscriptionModel::get_all()->fetch_all(MYSQLI_ASSOC);
$weights=WeightsModel::get_all()->fetch_all(MYSQLI_ASSOC);

$mysubs=SubscriptionModel::get_my_voucher( $_SESSION['id'])->fetch_all(MYSQLI_ASSOC);
$allhisub=[];
foreach($mysubs  as $sub)
{
    array_push($allhisub,$sub["Tipo_di_abbonamento"]);
}//value	validexpire_datetext	descr	status  start	    end	    measure
$allhisub=array_unique($allhisub);
$allhisub=array_values($allhisub);
echo json_encode($allhisub);
?>
<div class="h-screen flex-grow-1 overflow-y-lg-auto">
<main class="py-6 bg-surface-secondary">
<div class="container">
    <!-- Card stats -->
    <div class="row justify-content-center mt-0">
    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Spedisci in Italia con Cityex!</strong></h2>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Abbonamento</strong></li>
                                <li id="personal"><strong>Colli</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
<b><p> scegli l'abbonamento</p></b>   <br>                             
<select class="form-select" aria-label="Default select example" id="subscription-select">
<option id ="0"></option>
<?php foreach($allhisub as $row) { ?>
 <option id =<?=$row ?>><?=$row ?></option>
 <?php }?>
</select>
<br>
<b><p> scegli la fascia di peso</p></b>  <br>
<select class="form-select" aria-label="Default select example" id="weights-select">
<option id ="0"></option>
<?php foreach($weights as $row) { ?>
 <option id =<?=$row["id"] ?>><?=$row["start"] ?> kg - <?=$row["end"] ?> kg</option>
 <?php }?>
</select>
<div class="mt-2 mb-0 text-sm">
                        <i class="bi decrease-quantity bi-dash-circle-fill"></i>
                        <a href="#" class="btn item-quantity"> </a>
                        <i class="bi increase-quantity bi-plus-circle-fill"></i>
                        </div>
<br>
                            </div>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">inserisci i colli</h2>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <button type="button" class="btn btn-outline-primary product-type" onclick="addItem(0)">  Busta  </button>
                              <button type="button" class="btn btn-outline-primary product-type" onclick="addItem(1)">  Pacco  </button>
                              <button type="button" class="btn btn-outline-primary product-type" onclick="addItem(2)">Documento</button>
        </div>   <br><br>

<div id="products" class="container products" >
                                    <div class="row">
                                    <div class="col"> <input type="text" placeholder="peso ">  </div>
                                    <div class="col">     <input type="text" placeholder="lato1" >  </div>
                                    <div class="col">  <input type="text" placeholder="lato2" >  </div>
                                    <div class="col"> <input type="text" placeholder="lato3">  </div>
                                    <div class="col"> <button type="button" class="btn btn-outline-danger" onclick="deleterow(this)">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path> </svg>
              </button>  </div>
          </div></div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Payment Information</h2>
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                        <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div>
                                        <br>
                                    </div>
                                    <label class="pay">Card Holder Name*</label>
                                    <input type="text" name="holdername" placeholder=""/>
                                    <div class="row">
                                        <div class="col-9">
                                            <label class="pay">Card Number*</label>
                                            <input type="text" name="cardno" placeholder=""/>
                                        </div>
                                        <div class="col-3">
                                            <label class="pay">CVC*</label>
                                            <input type="password" name="cvcpwd" placeholder="***"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="pay">Expiry Date*</label>
                                        </div>
                                        <div class="col-9">
                                            <select class="list-dt" id="month" name="expmonth">
                                                <option selected>Month</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October</option>
                                                <option>November</option>
                                                <option>December</option>
                                            </select>
                                            <select class="list-dt" id="year" name="expyear">
                                                <option selected>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="make_payment" class="next action-button" value="Confirm"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
</div></div>
</div>





<div class="row justify-content-center mt-0">
    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3 components">

            <p>Riepilogo</p><br>


</div></div></div>





            </div>
        </main>
</html>

<script>
    window.addEventListener('load', (event) => {
        document.querySelectorAll('.item-quantity').forEach(function(qty_item) 
            {
            qty_item.textContent=0;
            });    
        });

        $qty="";
        var decr_buttons=document.querySelectorAll('.decrease-quantity');
        var incr_buttons=document.querySelectorAll('.increase-quantity');
        var addToCart_buttons=document.querySelectorAll('.addToCart');
        //console.log(incr_buttons);
        incr_buttons.forEach((e) =>{ 
            e.addEventListener("click", function(){
                    e.previousElementSibling.innerHTML=parseInt(e.previousElementSibling.innerHTML)+1;
              });
        });

        decr_buttons.forEach((e) =>{ 
            e.addEventListener("click", function(){
                  if(parseInt(e.nextElementSibling.innerHTML)>0)
                  { e.nextElementSibling.innerHTML=parseInt(e.nextElementSibling.innerHTML)-1;
                  }
              });
        });

        $quantity=0;
        addToCart_buttons.forEach((e) =>{ 
            e.addEventListener("click", function(){
                parentDiv = e.parentNode.parentNode.parentNode;
                //console.log(parentDiv);
                $quantity=parseInt(parentDiv.querySelector(".item-quantity").innerHTML);
                //console.log($quantity);
                $item_id=e.id;
                var xhttp = new XMLHttpRequest();
		        xhttp.open("POST", "./update-cart.php?id=" + $item_id + " &quantity=" + $quantity, true);
		        xhttp.onreadystatechange = function() {
                   
                            if (this.readyState == 4 && this.status == 200) {
                                var response = this.responseText;
                                console.log(response);
		                        // var resp = JSON.parse(response);
                                console.log("item-added");
                                ///console.log(this);
                            };
	          
              }
             
              xhttp.send();
            });
        });
</script>
<style>
.components {

	 border-radius: 3rem;
     border-radius: 66px;

box-shadow:32px 32px 64px #c7c7c7,
             -32px -32px 64px #f9f9f9;

}

    </style>