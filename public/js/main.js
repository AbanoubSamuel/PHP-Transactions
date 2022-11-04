// Render the PayPal button into #paypal-button-container
paypal.Buttons({

    style: {
        color: 'blue',
        shape: 'pill',
        label: 'pay',
        height: 40
    },

    // Set up the transaction
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: document.getElementById("credit_num").value
                }
            }]
        });
    },

    // Finalize the transaction
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (orderData) {
            // Successful capture! For demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            var transaction = orderData.purchase_units[0].payments.captures[0];

            var transactionData = {
                payment_id: transaction.id,
                amount: transaction.amount.value,
                currency: transaction.amount.currency_code,
                status: transaction.status,
                // _token: $('meta[name="csrf-token"]').attr('content')
            }

            // $('#example').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: {
            //         url: 'scripts/post.php',
            //         type: 'POST',
            //     },
            //     columns: transactionData,
            // });
            
            $.ajax({
                type: 'POST',
                url: "/transactions",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: transactionData,
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        alert(data.success);
                        window.location = '/transactions';
                    } else {
                        alert(data.error);
                        location.reload();
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log("Eroooooooooorrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr ....");
                    console.log(data);
                },
            });

            // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            // Replace the above to show a success message within this page, e.g.
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
        });
    }

}).render('#paypal-button-container');