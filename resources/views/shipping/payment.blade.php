@extends('layouts.paymentsheader')
@section('pagecontent')
<div class="content" style="padding-top: 200px">
    <div class="row">
      <div class="col col-md-4  col-lg-4 mb-4 "></div>
      <div class="col col-md-4  col-lg-4 mb-4 ">
        <form action="{{route('makepayment')}}" method="post" id="payment-form" class="form">
    {{csrf_field()}}
    <div >
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element" class="form form-control">
          <!-- A Stripe Element will be inserted here. -->
        </div>

      <!-- Used to display Element errors. -->
      <div id="card-errors" role="alert"></div>
    </div>
    <br>
    <button class="btn btn-success btn-block">Submit Payment</button>
  </form>

      </div>
      <div class="col col-md-4  col-lg-4 mb-4 "></div>
    </div>

</div>
  <script type="text/javascript">

    var stripe = Stripe('pk_test_ANfSCCok3frynxYJykXlfd8j');
    var elements = stripe.elements();
    var style = {
    base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#32325d",
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });
    var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the customer that there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });
  function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
  </script>
@endsection

