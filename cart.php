

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
<?php
session_start();
require_once "./models/VoucherModel.php";
include "./reserved-navbar.php";

//echo json_encode($_SESSION);
$vouchers=VoucherModel::get_all()->fetch_all(MYSQLI_ASSOC);
//echo json_encode($vouchers);
//value	validexpire_datetext	descr	status  start	    end	    measure
?>
<div class="h-screen flex-grow-1 overflow-y-lg-auto">
<main class="py-6 bg-surface-secondary">
<div class="container">
    <!-- Card stats -->
    <div class="row g-6 mb-6">
            <?php foreach($vouchers as $v) { 
                 ?>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Prezzo</span>
                            <span class="h3 font-bold mb-2"><?= $v["value"]?> €</span><br><br>
                            <span class="h4 font-semibold text-muted text-sm d-block mb-2">descrizione: </span>
                            <span class="h6 font-semibold  text-sm  mb-2"><?= $v["descr"]?> </span><br><br>
                            <span class="h4 font-semibold text-muted text-sm d-block mb-5">specifiche: </span>
                            <span class="h6 font-bold mb-2"><?= $v["start"]?> - <?= $v["end"]?>  <?= $v["measure"]?> </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="bi bi-credit-card"></i>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                    <div class="col">
                    <div class="mt-2 mb-2 text-sm">
                        
                        <a href="#" id="<?= $v["id"]?>" class="btn btn-primary addToCart" style="background-color:blue;"> Aggiungi</a>

                    </div></div>
                    <div class="col">
                    <div class="mt-2 mb-0 text-sm">
                        <i class="bi decrease-quantity bi-dash-circle-fill"></i>
                        <a href="#" class="btn item-quantity"> </a>
                        <i class="bi increase-quantity bi-plus-circle-fill"></i>
                        </div>
                    </div></div>
                </div>
            </div>
        </div>
    <?php }?>
            </div>
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