<?php
include '../databaseconnection.php';
include ('../entrepreneurs/entreprenursession.php');


$advisors = [];
$timeslots = [];
$noAdvisorsMessage = '';
$selectedField = '';
$showFieldMessage = true; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['advisor_field'])) {
    $selectedField = $_POST['advisor_field'];
    $showFieldMessage = false; // Hide the message if a field is selected

    $query = $conn->prepare("SELECT * FROM advisor WHERE advisor_field = ?");
    $query->bind_param("s", $selectedField);
    $query->execute();
    $result = $query->get_result();

    while ($row = $result->fetch_assoc()) {
        $advisors[] = $row;
    }

    if (empty($advisors)) {
        $noAdvisorsMessage = 'No advisors found for the selected field.';
    }

    $query->close();
}

// Fetch timeslots with their IDs
$timeslotQuery = "SELECT time_id, timeslot FROM meeting_time";
$timeslotResult = $conn->query($timeslotQuery);
if ($timeslotResult->num_rows > 0) {
    while ($row = $timeslotResult->fetch_assoc()) {
        $timeslots[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StartupCompanion | Navigate your startup journey</title>
    <link rel="icon" href="../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">
    <link href="../admins/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admins/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h3 style="margin-top:20px;">Add New Request</h3>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6 mb-3">
                        <form method="POST" id="advisorForm" action="">
                            <label class="form-label"><strong>Select Field</strong></label>
                            <select id="advisor_field" name="advisor_field" class="form-control" required>
                                <option value="0">Select a field</option>
                                <option value="Agriculture and Food-Tech" <?= $selectedField == 'Agriculture and Food-Tech' ? 'selected' : '' ?>>Agriculture and Food-Tech</option>
                                <option value="Consumer Goods" <?= $selectedField == 'Consumer Goods' ? 'selected' : '' ?>>Consumer Goods</option>
                                <option value="Creative Arts and Media" <?= $selectedField == 'Creative Arts and Media' ? 'selected' : '' ?>>Creative Arts and Media</option>
                                <option value="Education" <?= $selectedField == 'Education' ? 'selected' : '' ?>>Education</option>
                                <option value="Entertainment" <?= $selectedField == 'Entertainment' ? 'selected' : '' ?>>Entertainment</option>
                                <option value="Health and Wellness" <?= $selectedField == 'Health and Wellness' ? 'selected' : '' ?>>Health and Wellness</option>
                                <option value="Hospitality and Tourism" <?= $selectedField == 'Hospitality and Tourism' ? 'selected' : '' ?>>Hospitality and Tourism</option>
                                <option value="Manufacturing and Industry" <?= $selectedField == 'Manufacturing and Industry' ? 'selected' : '' ?>>Manufacturing and Industry</option>
                                <option value="Real Estate and Property Management" <?= $selectedField == 'Real Estate and Property Management' ? 'selected' : '' ?>>Real Estate and Property Management</option>
                                <option value="Retail and E-commerce" <?= $selectedField == 'Retail and E-commerce' ? 'selected' : '' ?>>Retail and E-commerce</option>
                                <option value="Social Impact and Nonprofit" <?= $selectedField == 'Social Impact and Nonprofit' ? 'selected' : '' ?>>Social Impact and Nonprofit</option>
                                <option value="Technology" <?= $selectedField == 'Technology' ? 'selected' : '' ?>>Technology</option>
                                <option value="Transportation and Logistics" <?= $selectedField == 'Transportation and Logistics' ? 'selected' : '' ?>>Transportation and Logistics</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <?php if ($showFieldMessage): ?>
                    <div class="alert alert-info text-center" role="alert">
                       <strong> Please select a field to see available advisors.</strong>
                    </div>
                <?php endif; ?>
            <div class="col-12">
                <div class="row g-2" id="advisor_cards_container">
                    <?php if (!empty($advisors)): ?>
                        <?php foreach ($advisors as $advisor): ?>
                            <div class="col-3 mt-3 mb-3">
                                <div class="card border border-1 border-success-subtle rounded" style="width: 18rem;">
                                    <?php
                                    $imgSrc = $advisor['prof_img'] ? '../advisors/uploads/logo/' . htmlspecialchars($advisor['prof_img']) : '../images/defaultimage.png';
                                    ?>
                                    <img src="<?= $imgSrc ?>" class="card-img-top img-thumbnail" style="height: 250px;" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold text-black" style="background-color:#6495ED;">
                                            <?= htmlspecialchars($advisor['advisor_name']) ?>
                                        </h5>
                                     

                                        <p class="card-text">Advising on: <?= htmlspecialchars($advisor['advisor_advisingcomponent']) ?></p>
                                        <p class="card-text"> <?= htmlspecialchars($advisor['advisor_designation']) ?> from <?= htmlspecialchars($advisor['advisor_company']) ?>
                                        </p>
                                        </p>
                                        <p class="card-text">Duration of a session: 1 hour
                                        <p class="card-text">Payment for a Session : LKR 1000

                                            <!-- <?= htmlspecialchars($advisor['advisor_email']) ?> -->
                                        </p>
                                        <div class="col-12 d-grid">
                                            <a href="#" class="btn btn-primary"style = "background-color: #000080;"
                                                onclick="makeRequest('<?= htmlspecialchars($advisor['id_advisor']) ?>');">Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!-- modal -->
<div class="modal" tabindex="-1" id="advisorModal<?= htmlspecialchars($advisor['id_advisor']); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="submit_request.php">
                <div class="modal-header">
                    <h5 class="modal-title"><?= htmlspecialchars($advisor['advisor_name']) ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="advisor_id" value="<?= htmlspecialchars($advisor['id_advisor']); ?>">
                    <input type="hidden" name="user_id" value="<?php echo $loggedin_userid; ?>">
                    <div class="col-12">
                        <label class="form-label fw-bold">Qualifications: <?= htmlspecialchars($advisor['advisor_qualifications']) ?></label>
                      <br>  <label class="form-label fw-bold">Work Experience: <?= htmlspecialchars($advisor['advisor_noofexperience']) ?>years</label>

                    </div>
                    <div class="col-12">
                        <label class="form-label text-success fw-bold">Available Dates</label>
                    </div>
                    <div class="col-12 mb-3">
                        <input type="date" name="meeting_date" class="datepicker-days" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-success fw-bold">Available Times</label>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <?php foreach ($timeslots as $timeslot): ?>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="timeslot_id" value="<?= htmlspecialchars($timeslot['time_id']) ?>" id="flexRadioDefault<?= htmlspecialchars($timeslot['time_id']) ?>" required>
                                        <label class="form-check-label" for="flexRadioDefault<?= htmlspecialchars($timeslot['time_id']) ?>">
                                            <?= htmlspecialchars($timeslot['timeslot']) ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-success fw-bold">Message</label>
                        </div>
                        <div class="col-12 mb-3">
                        <textarea name="message" placeholder="Message to advisor" rows="4" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->

                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-warning text-center" role="alert">
                                <?= $noAdvisorsMessage ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="meetings.js"></script>

    <script>
        document.getElementById('advisor_field').addEventListener('change', function () {
            document.getElementById('advisorForm').submit();
        });
    </script>
</body>

</html>
