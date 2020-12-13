<?php
?>

<div class="pay" >
    <form method="post" action="/charge.php" id="payment-form">
        <div class="section">
            <label> Credit Card </label>
            <div id="card-element">
            </div>

            <div id="card-errors">
            </div>
        </div>

        <input type="hidden" value="1" name="pay_is_submitted" >

        <input type="submit" value="pay" class="pay-button" name="pay_is_submitted">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>

<script src="/assets/javascript/charge.js"></script>
