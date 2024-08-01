var advisorModal;

function makeRequest(id){

    var modal = document.getElementById("advisorModal"+id);
    advisorModal = new bootstrap.Modal(modal);
    advisorModal.show();

}

var requestModal;

function acceptRequest(){
    var modal = document.getElementById("requestModal");
    requestModal = new bootstrap.Modal(modal);
    requestModal.show();
}

var rejectModal;

function rejectRequest(){
    var modal = document.getElementById("rejectModal");
    rejectModal = new bootstrap.Modal(modal);
    rejectModal.show();
}

function payNow(id){

    var mid = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.status == 200 && request.readyState == 4){
            var response = request.responseText;

            var obj = JSON.parse(response);

            // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        window.location = "myrequests.php";
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": obj["merchant_id"],    // Replace your Merchant ID
        "return_url": "http://localhost/msccollaborate/mscproject/meetings/buynow.php",     // Important
        "cancel_url": "http://localhost/msccollaborate/mscproject/meetings/buynow.php",     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": mid,
        "items": "Request Payment",
        "amount": "1000.00",
        "currency": "LKR",
        "hash": obj["hash"], // *Replace with generated hash retrieved from backend
        "first_name": "Saman",
        "last_name": "Perera",
        "email": "samanp@gmail.com",
        "phone": "0771234567",
        "address": "No.1, Galle Road",
        "city": "Colombo",
        "country": "Sri Lanka",
        "delivery_address": "-",
        "delivery_city": "-",
        "delivery_country": "-",
        "custom_1": "",
        "custom_2": ""
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    // };
        }
    }

    request.open("POST","paynowProcess.php?mid="+mid,true);
    request.send();

}