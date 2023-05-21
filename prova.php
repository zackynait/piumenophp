<!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]

  @layer components {
    .no-spinner {
      -moz-appearance: textfield;
    }

    .no-spinner::-webkit-outer-spin-button,
    .no-spinner::-webkit-inner-spin-button {
      margin: 0;
      -webkit-appearance: none;
    }
  }
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.2.0/dist/themes/light.css" />
<script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.2.0/dist/shoelace.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
  <option value="WY">Wyoming</option>
</select>

<sl-select label="Favorite Animal" clearable required>
    <sl-option value="birds">Birds</sl-option>
    <sl-option value="cats">Cats</sl-option>
    <sl-option value="dogs">Dogs</sl-option>
    <sl-option value="other">Other</sl-option>
  </sl-select>
<div>
  <label for="Quantity" class="sr-only"> Quantity </label>

  <div class="flex items-center border border-gray-200 rounded">
    <button
      type="button"
      class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
    >
      &minus;
    </button>

    <input
      type="number"
      id="Quantity"
      value="1"
      class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
    />

    <button
      type="button"
      class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
    >
      &plus;
    </button>
  </div>
</div>

<br><br><br>

<div class="custom-select" style="width:200px;">
  <select>
    <option value="0">Select car:</option>
    <option value="1">Audi</option>
    <option value="2">BMW</option>
    <option value="3">Citroen</option>
    <option value="4">Ford</option>
    <option value="5">Honda</option>
    <option value="6">Jaguar</option>
    <option value="7">Land Rover</option>
    <option value="8">Mercedes</option>
    <option value="9">Mini</option>
    <option value="10">Nissan</option>
    <option value="11">Toyota</option>
    <option value="12">Volvo</option>
  </select>
</div>

<div>
  <label for="Quantity" class="sr-only"> Quantity </label>

  <div class="flex items-center border border-gray-200 rounded">
    <button
      type="button"
      class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
    >
      &minus;
    </button>

    <input
      type="number"
      id="Quantity"
      value="1"
      class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
    />

    <button
      type="button"
      class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
    >
      &plus;
    </button>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>



<select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
  <option value="WY">Wyoming</option>
</select>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
  </script>

  <style>
    .custom-select,select,option{
  width: 100% !important;
  box-shadow: inset 0 0 15px rgba(55, 84, 170, 0), inset 0 0 20px rgba(255, 255, 255, 0), 7px 7px 15px rgba(55, 84, 170, .15), -7px -7px 20px rgba(255, 255, 255, 1), inset 0px 0px 4px rgba(255, 255, 255, .2);
	 -webkit-touch-callout: none;

}
    </style>