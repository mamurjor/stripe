// Create a Stripe client.
var stripe = Stripe('PUBLISHABLE_KEY');
  
// Create an instance of Elements.
var elements = stripe.elements();
  
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

  
// Create an instance of the card Element.
var card = elements.create('card', {style: style});

  
// Add an instance of the card Element into the `card-element`