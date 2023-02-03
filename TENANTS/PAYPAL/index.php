<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://www.paypal.com/sdk/js?client-id=AQn-FBXshx9d57vYxnzuB9xlT1KqXFhZTDKhXur-uK7fdv_tJWs4lx9AccIJEeJt1Hcig5UKg5P3pQ7_&currency=PHP"></script>
</head>
<body>

<?php

$id = $_GET['id'];
$pay = $_GET['pay'];

?>

	                                        <input type="hidden" value="<?php echo $id; ?>"/>
                                              <div id="paypal-button-container<?php echo $id; ?>"></div>


                                        <script>
                                              paypal.Buttons({
                                                // Sets up the transaction when a payment button is clicked
                                                createOrder: (data, actions) => {
                                                  return actions.order.create({
                                                    purchase_units: [{
                                                      amount: {
                                                        currency: 'PHP',
                                                        value: <?php echo $pay; ?> // Can also reference a variable or function
                                                      }
                                                    }]
                                                  });
                                                },
                                                // Finalize the transaction after payer approval
                                                onApprove: (data, actions) => {
                                                  return actions.order.capture().then(function(orderData) {
                                                    // Successful capture! For dev/demo purposes:
                                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                    const transaction = orderData.purchase_units[0].payments.captures[0];
                                                    // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                                    const element = document.getElementById('paypal-button-container<?php echo $id; ?>');
                                                    element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                    // Or go to another URL:  
                                                    window.location.href = "success.php?id=<?php echo $id; ?>";
                                                  });
                                                }
                                              }).render('#paypal-button-container<?php echo $id; ?>');


                                            </script>







   <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            style: {
                layout: 'vertical',
                color:  'gold',
                shape:  'pill',
                label:  'pay',
            }

        }).render('#paypal-button-container');
    </script>	

</body>
</html>