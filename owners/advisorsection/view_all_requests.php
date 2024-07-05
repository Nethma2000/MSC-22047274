<!DOCTYPE html>

<html>

<head>
    <title>View all requests</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #e0c1e8;" class="bg-" onload="viewAllRequests();">

    <div class="container-fluid">
        <div class="row">
      
            <div class="col-12 text-center mt-5">
                <h1 class="text-dark fw-bold text-decoration-underline">All Requests</h1>
            </div>
            <div class="col-6 d-grid">
                                    <button style="background-color: white;color:purple;font-weight:bold;font-size: 24px" class="btn btn-"><a href="scheduleMeeting.php">Schedule Meetings</a> </button>
                                </div>
            <div class="col-12 mt-3">

                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Institute</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tb">

                        

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>