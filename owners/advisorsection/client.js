var stripe = Stripe('pk_test_51L28vMG5BcKy7lb7pHwKLvot8ZbQakL48o1kOIa4uTkgyNQbRIPL1bUtF3BrIEl6UkuuYydinUiVnv2EHWyUduaR00pSoBknQ4');

var checkoutButton = document.querySelector('#checkout-button');
checkoutButton.addEventListener('click', function () {
  stripe.redirectToCheckout({
    lineItems: [{
      // Define the product and price in the Dashboard first, and use the price
      // ID in your client-side code.
      price: '{PRICE_ID}',
      quantity: 1
    }],
    mode: 'payment',
    successUrl: 'https://www.example.com/success',
    cancelUrl: 'https://www.example.com/cancel'
  });
});