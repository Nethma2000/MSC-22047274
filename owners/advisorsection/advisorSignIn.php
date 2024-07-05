<!DOCTYPE html>

<html>

<head>
    <title>advisor log in</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #e0c1e8;">
    <div class="container-fluid">
        <div class="row g-2">

            <div class="col-12">
                <p class="fs-1 fw-bold">Sign In to your account as an Advisor</p>
                <span class="text-danger" id="msg2"></span>
            </div>

            <div class="col-12">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" id="email3" />
            </div>

            <div class="col-12">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" id="password3" />
            </div>

            <div class="col-6 d-grid">
                <button class="btn btn-primary" onclick="advisorSignInProcess();">Sign In</button>
            </div>

            <div class="col-6 d-grid">
                <button class="btn btn-dark" onclick="gotostudentsignin();">Sign In as a student</button>
            </div>

        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>