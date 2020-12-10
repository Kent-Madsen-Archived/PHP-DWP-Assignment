var stripe = Stripe('pk_test_51HwmmbHfiP2HcRWATMmAGqqboPJrMn5LmfBmlG4VQeFRXAeOXi66I3NEtcC98NeuwOZieV5AbS7meLALX7MAbr5G00v0fa8ew2');
var elements = stripe.elements();

// Create an instance of the card Element
var card = elements.create('card');

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');// Handle real-time validation errors from the card Element.

card.addEventListener('change',
    function(event) {
    var displayError = document.getElementById('card-errors');

    if (event.error)
    {
        displayError.textContent = event.error.message;
    }
    else
        {
        displayError.textContent = '';
    }
});

// Handle form submission
var form = document.getElementById('payment-form');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then( function(result)
    {
        if (result.error)
        {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        }
        else
        {
            stripeTokenHandler(result.token);
        }
    });
});

// Send Stripe Token to Server
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');

    // Add Stripe Token to hidden input
    var hiddenInput = document.createElement('input');

    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripe_token');
    hiddenInput.setAttribute('value', token.id);

    form.appendChild(hiddenInput);

    // Submit form
    form.submit();
}