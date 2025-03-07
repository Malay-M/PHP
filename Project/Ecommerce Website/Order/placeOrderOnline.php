<?php
session_start();

include('../Connect/connect.php');

$username = $_COOKIE['username'];

$query = "SELECT * FROM register WHERE username = '$username'";
$sql = mysqli_query($conn, $query);

$value = mysqli_fetch_assoc($sql);

$name = $value['name'];
$email = $value['email'];
$amount = $_SESSION['total_price'];
$phone = $value['phone'];
$invoice = $_SESSION['invoice'];
$_SESSION['email'] = $email;

?>
<html>

<head>
    <title>Pay Online</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>

    <form>
        <input style="display:none;" type="textbox" name="name" id="name" value="<?php echo $name; ?>" required /><br /><br />
        <input style="display:none;" type="textbox" name="amt" id="amt" value="<?php echo $amount; ?>" required /><br /><br />
        <input style="display:none;" type="textbox" name="btn" id="email" value="<?php echo $email; ?>" required />
        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
    </form>

    <script>
        pay_now();
        function pay_now() {
            var name = jQuery('#name').val();
            var amt = jQuery('#amt').val();

            jQuery.ajax({
                type: 'post',
                url: 'payment_process.php',
                data: "amt=" + amt + "&name=" + name + "&email=",
                success: function(result) {
                    var options = {
                        "key": "API_KEY",
                        "amount": amt * 100,
                        "currency": "INR",
                        "name": "Quick Order",
                        "description": "<?php echo $invoice; ?>",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "prefill": {
                            "email": "<?php echo $email; ?>",
                            "contact": "<?php echo $phone; ?>",
                        },
                        "handler": function(response) {
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment_process.php',
                                data: "payment_id=" + response.razorpay_payment_id,
                                success: function(result) {
                                    window.location.href = "placeOrder.php";
                                }
                            });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    </script>

</body>
</html>
