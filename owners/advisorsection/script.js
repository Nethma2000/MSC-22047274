function studentSignInProcess() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "view_all_advisors.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "studentSignInProcess.php", true);
    r.send(form);
}

function advisorSignInProcess() {
    var email = document.getElementById("email3");
    var password = document.getElementById("password3");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "view_all_requests.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "advisorSignInProcess.php", true);
    r.send(form);
}

function gotostudentsignin() {
    window.location = "index.php";
}

function gotoadvisorsignin() {
    window.location = "advisorSignIn.php";
}

function viewAllAdvisors() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("tb").innerHTML = t;

        }
    }

    r.open("GET", "viewAllAdvisorsProcess.php", true);
    r.send();

}

function searchAdvisor() {

    var searchAdvisor = document.getElementById("searchAdvisor");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("tb").innerHTML = t;

        }
    }

    r.open("GET", "searchAdvisorsProcess.php?sa=" + searchAdvisor.value, true);
    r.send();

}

function addRequest(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {
                document.getElementById("rbtn" + id + "").disabled = true;
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "saveRequestProcess.php?id=" + id, true);
    r.send();

}

function addfavourite(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {
                document.getElementById("fbtn" + id + "").disabled = true;
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "savefavouriteProcess.php?id=" + id, true);
    r.send();
}

function viewAllRequests() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("tb").innerHTML = t;

        }
    }

    r.open("GET", "viewAllRequestsProcess.php", true);
    r.send();

}

function raccept(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {

                alert("The request has been ACCEPTED");
                window.location = "view_all_requests.php";

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "acceptRequestsProcess.php?id=" + id, true);
    r.send();

}

function rdecline(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {

                alert("The request has been DECLINED");
                window.location = "view_all_requests.php";

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "declineRequestsProcess.php?id=" + id, true);
    r.send();

}

function viewpaidlist() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("tabbody").innerHTML = t;
        }
    }

    r.open("GET", "viewpaidlistprocess.php", true);
    r.send();

}

var bm;
function Schedulemeeting(id) {

    var m = document.getElementById("meetingModal");
    bm = new bootstrap.Modal(m);

    document.getElementById("smemail").value = id;

    bm.show(id);

}

function finishschedule() {

    var stu_email = document.getElementById("smemail");
    var day = document.getElementById("smdate");
    var time = document.getElementById("smtime");
    var link = document.getElementById("smlink");

    var form = new FormData();
    form.append("e", stu_email.value);
    form.append("d", day.value);
    form.append("t", time.value);
    form.append("l", link.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "scheduleMeeting.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "finishscheduleprocess.php", true);
    r.send(form);

}

function viewmeetings() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("meetingbox").innerHTML = t;
            // alert (t);
        }
    }

    r.open("GET", "viewmeetingsprocess.php", true);
    r.send();

}

function endconsult(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if(t = "success"){

                window.location = "scheduleMeeting.php";

            }else{

                alert(t);

            }

        }
    }

    r.open("GET", "stopmeetingsprocess.php?id=" + id, true);
    r.send();

}

var nm;
function viewnotifications(){

    var mm = document.getElementById("viewnotificationmodal");
    nm = new bootstrap.Modal(mm);

    nm.show();
    
}

function updatestatus(id){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

                // alert(t);

        }
    }

    r.open("GET", "updatestatusprocess.php?id=" + id, true);
    r.send();
    
}














// function fad() {

//     var e = document.getElementById("email").value;

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {

//             var t = r.responseText;
//             document.getElementById("adselect").innerHTML = t;
//         }
//     }

//     r.open("GET", "findAdvisorProcess.php?t=" + e, true);
//     r.send();

// }

// function verify1() {

    // var txt = document.getElementById("verify1").value;
    // var adid = document.getElementById("adselect").value;
    // var e = document.getElementById("email").value;

    // var r = new XMLHttpRequest();

    // r.onreadystatechange = function() {
    //     if (r.readyState == 4) {

    //         var t = r.responseText;

    //         if (t == "success") {

    //             document.getElementById("verify1").style.borderColor = "green";
    //             document.getElementById("verify1").style.color = "green";
    //             document.getElementById("verify1").style.fontWeight = "bold";
    //             // document.getElementById("proceed").disabled = false;
    //             document.getElementById("verify2").disabled = false;

    //         } else {

    //             document.getElementById("verify1").style.borderColor = "red";
    //             document.getElementById("verify1").style.color = "red";
    //             document.getElementById("verify1").style.fontWeight = "bold";
    //             // document.getElementById("proceed").disabled = true;
    //             document.getElementById("verify2").disabled = true;

    //         }

    //     }
    // }

    // r.open("GET", "verifyProcess1.php?txt=" + txt + "&id=" + adid + "&e=" + e, true);
    // r.send();

//     alert ("ok");

// }

// function verify2() {

//     var txt1 = document.getElementById("verify1").value;
//     var txt2 = document.getElementById("verify2").value;

//     if (txt1 == txt2) {

//         document.getElementById("verify2").style.borderColor = "green";
//         document.getElementById("verify2").style.color = "green";
//         document.getElementById("verify2").style.fontWeight = "bold";

//     } else {

//         document.getElementById("verify2").style.borderColor = "red";
//         document.getElementById("verify2").style.color = "red";
//         document.getElementById("verify2").style.fontWeight = "bold";

//     }

// }



