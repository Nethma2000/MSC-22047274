<!DOCTYPE html>

<html>

<head>
<title>StartupCompanion | Navigate your startup journey</title>
<link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #e0c1e8;">
    <div class="container-fluid">
        <div class="row g-2">

            <div class="col-12">
                <p class="fs-1 fw-bold">Sign In to your account as a Student</p>
                <span class="text-danger" id="msg2"></span>
            </div>

            <div class="col-12">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" id="email2" />
            </div>

            <div class="col-12">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" id="password2" />
            </div>

            <div class="col-6 d-grid">
                <button class="btn btn-primary" onclick="studentSignInProcess();">Sign In</button>
            </div>

            <div class="col-6 d-grid">
                <button class="btn btn-dark" onclick="gotoadvisorsignin();">Sign In as an advisor</button>
            </div>

        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>