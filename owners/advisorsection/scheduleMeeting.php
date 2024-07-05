<!DOCTYPE html>

<html>

<head>
    <title>Schedule Meetings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #e0c1e8;" class="bg-" onload="viewpaidlist();viewmeetings();">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 text-center mt-5">
                <h1 class="text-dark fw-bold text-decoration-underline">Schedule Meetings</h1>
            </div>

            <div class="col-12 mt-3">

                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Institute</th>
                            <th>Progress</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabbody">

                    </tbody>
                </table>

            </div>

            <div class="col-12">
                <hr class="mt-3 mb-3" />
            </div>

            <div class="col-12 bg-body">
                <div class="row g-2">

                    <div class="col-12 text-center mt-5">
                        <h3 class="text-dark fw-bold text-decoration-underline">My Meetings</h3>
                    </div>

                    <div class="col-12">
                        <div class="row" id="meetingbox">

                        </div>
                    </div>

                </div>
            </div>

            <!-- modal -->

            <div class="modal" tabindex="-1" id="meetingModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Zoom Meeting</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="row g-2">

                                    <div class="col-12">
                                        <label class="form-label">Student Email</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="email" class="form-control" id="smemail"/>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Date</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="date" class="form-control" id="smdate"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Time</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="time" class="form-control" id="smtime"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Meeting Link</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="smlink"/>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="finishschedule();">Finish Scheduling</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>