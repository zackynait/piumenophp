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

//$a=VoucherModel::get_all()->fetch_all(MYSQLI_ASSOC);
//echo json_encode($vouchers);
//value	validexpire_datetext	descr	status  start	    end	    measure
?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="wizard.js"></script>
<link rel="stylesheet" href="wizard.css">



<div class="h-screen flex-grow-1 overflow-y-lg-auto">
<main class="py-6 bg-surface-secondary">
<div class="container-fluid">



<!-- MultiStep Form -->
<div class="row justify-content-center mt-0">
    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <h2><strong>Spedisci in Italia con Cityex!</strong></h2>
            <div class="row">
                <div class="col-md-12 mx-0">
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Tratta</strong></li>
                            <li id="personal"><strong>Colli</strong></li>
                            <li id="payment"><strong>Payment</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <h2 class="fs-title">Inserisci il percorso</h2>
                                <div class="row"><div class="col">Partenza<?= generateCompanyNameSelector("new-cap-id") ?></div>
                                <div class="col">Destinazione<?= generateCompanyNameSelector("new-destination-cap-id") ?></div></div>
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
        </div>
    </div>
</div>

<!--
<div class="row g-6 mb-6">
<form id="regForm" action="">

<h1>Spedisci in Italia a partire da 5,70€:</h1>

 One "tab" for each step in the form: 
<div class="tab">
<div class="input-group">
          <input type="text" placeholder="aaa" class="form-control">
          <span>                </span>
          <input type="text" placeholder="bbbb" class="form-control">
    
      </div>
  <div class="row"><div class="col">Partenza<input placeholder="cap inizio" oninput="this.className = ''"></div>
  <div class="col">Destinatario<input placeholder="cap destinatario" oninput="this.className = ''"></div></div>
</div>

<div class="tab">scegli tipologia merci:<br><br>
<div class="btn-group" role="group" aria-label="Basic outlined example">
  <button type="button" class="btn btn-outline-primary product-type" onclick="addItem(0)">  Busta  </button>
  <button type="button" class="btn btn-outline-primary product-type" onclick="addItem(1)">  Pacco  </button>
  <button type="button" class="btn btn-outline-primary product-type" onclick="addItem(2)">Documento</button>
</div>
<br><br>
<div id="products" class="container products">
      <div class="input-group">
          <input type="text" placeholder="peso" class="form-control">
          <input type="text" placeholder="lato1" class="form-control">
          <input type="text" placeholder="lato2" class="form-control">
          <input type="text" placeholder="lato3" class="form-control">
          <button type="button" class="btn btn-outline-danger" onclick="deleterow(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                 <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path>
                 </svg>
              </button>
      </div>

</div>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
  <br>
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

Circles which indicates the steps of the form:
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>
</div>
-->







</div>
</main>
</div>
</div>









<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


function addItem(n) {
  // This function will figure out which tab to display
  var x = document.getElementById("products");
  x.innerHTML +=
            ' <div class="row">\
                                    <div class="col"> <input type="text" placeholder="peso" class="form-control">  </div>\
                                    <div class="col">     <input type="text" placeholder="lato1" class="form-control">  </div>\
                                    <div class="col">  <input type="text" placeholder="lato2" class="form-control">  </div>\
                                    <div class="col"> <input type="text" placeholder="lato3" class="form-control">  </div>\
                                    <div class="col"> <button type="button" class="btn btn-outline-danger" onclick="deleterow(this)">\
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path> </svg>\
              </button>  </div>';
}

function deleterow(o) {
var p=o.parentNode.parentNode.parentNode;
console.log(p);
console.log(o.parentNode)
p.removeChild(o.parentNode.parentNode);
}

</script>
<style>
/* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;s
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>