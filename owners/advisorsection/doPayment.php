<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Do payment</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-info">

    <div class="container-fluid">
        <div class="row g-2">

            <div class="col-12 text-center mt-5">
                <p class="fs-1 fw-bold">Pay for contact your Advisor</p>
            </div>

            <div class="offset-0 offset-lg-3 col-12 col-lg-6 bg-white rounded">
                <div class="row g-2">



                    <div class="col-12 mt-3 mb-3">
                        <h2 class="text-primary fw-bold">Billing Details</h2>
                    </div>

                    <form autocomplete="off" action="checkout-charge.php" method="POST">

                        <div class="col-12">
                            <label class="form-label">Student Name</label>
                            <input class="form-control" type="text" name="c_name" />
                        </div>

                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" type="email" id="email" onkeyup="fad();" name="address"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Contact no.</label>
                            <input class="form-control" type="text" id="ph" name="phone" />
                        </div>

                        <div class="col-12">
                            <label class="form-label">Advisor</label>
                            <!-- <select class="form-select" id="adselect"  name="product_name">


                        </select> -->
                            <input type="text" name="product_name" value="<?php echo $_GET["advisor"]; ?>" class="form-control">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="amount" value="<?php echo $_GET["price"]; ?>" />
                        </div>

                        <div class="col-12 ">
                            <label class="form-label">Verification code</label>
                            <input class="form-control" type="text" name="verify1" />
                        </div>

                        <div class="col-12">
                            <input type="hidden" name="advisor_id" class="form-control" value="<?php echo $_GET["advisorid"]; ?>"/>
                            <input type="hidden" name="stu_email" class="form-control" value="<?php echo $_GET["studentemail"]; ?>"/>
                        </div>

                        <div class="col-12 d-grid mb-3 mt-3">

                            <!-- <button class="btn btn-primary" id="payButton" type="submit" onclick="pay();">Proceed to pay</button> -->

                            <script src="https://checkout.stripe.com/checkout.js" 
                            class="stripe-button" 
                            data-key="pk_test_51L28vMG5BcKy7lb7pHwKLvot8ZbQakL48o1kOIa4uTkgyNQbRIPL1bUtF3BrIEl6UkuuYydinUiVnv2EHWyUduaR00pSoBknQ4" 
                            data-amount=<?php echo str_replace(",", "", $_GET["price"]) * 100 ?> 
                            data-name="<?php echo $_GET["advisor"] ?>" 
                            data-description="<?php echo $_GET["desc"] ?>" 
                            data-image="resources/limg.png" 
                            data-currency="lkr" 
                            data-locale="auto">
                            </script>

                        </div>

                        <div class="col-12 d-grid mb-3">
                            <button class="btn btn-danger" onclick="goback();">Maybe later</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    </form>


    <script>
        

        function goback() {
            window.history.go(-1);
        }

        $('#ph').on('keypress', function() {
            var text = $(this).val().length;
            if (text > 9) {
                return false;
            } else {
                $('#ph').text($(this).val());
            }

        });

        // $('#verify1').on('keypress',function(){
        //     alert ("ok");
        // });
    </script>

    <script src="script.js"></script>

</body>

</html>

<?php

/* <?php echo str_replace(",", "", "100000") ?>*/

?>