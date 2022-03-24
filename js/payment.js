const paymentForms = document.querySelectorAll('.paymentForm')
paymentForms.forEach(paymentForm => {
    
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
        key: 'pk_test_0c33d37dd61cc39c532234fc1e6083c74527b624', // Replace with your public key
        // email: paymentForm.querySelectorAll('input')[0].value,
        // amount: paymentForm.querySelectorAll('input')[1].value * 100,
        email: 'adwele@gmail.com',
        amount: 300 * 100,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
            alert('Window closed.');
            // window.location = ''
        },
        callback: function(response){
            let message = 'Payment complete! Reference: ' + response.reference;
            alert(message);
            window.location = `verify.php?reference=${response.reference}&id=${paymentForm.id}`
        }
    });
    handler.openIframe();
    // console.log(paymentForm.querySelectorAll('input')[0].value)
    }

})