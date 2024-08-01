<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>StartupCompanion | Navigate your startup journey</title>
    <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
    <?php require 'utils/styles.php'; ?>
    <?php require 'utils/scripts.php'; ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
        body {
            background-color: #f6f9ff;
        }
    </style>
</head>

<body>
    <div class="row">
        <?php
        require 'utils/connection.php';

        $field = isset($_GET['field']) ? $_GET['field'] : '';

        $sql = "SELECT * FROM events WHERE field = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $field);
        $stmt->execute();
        $result = $stmt->get_result();

        $headingDisplayed = false;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $eventID = $row["eventID"];
                $eventTitle = htmlspecialchars($row["title"]);
                $eventDescription = htmlspecialchars($row["description"]);
                $eventDate = $row["date"]; 
                $eventTime = $row["time"];
                $eventImage = htmlspecialchars($row["img"]);
                $eventLocation = htmlspecialchars($row["location"]); 
                $eventType = $row["type"];
                $eventLink = $row["link"];

                if (!$headingDisplayed) {
                    echo '
                    <div class="content"><!--body content holder-->
                        <div class="container">
                            <div class="col-md-12"><!--body content title holder with 12 grid columns-->
                                <h1>Events in ' . htmlspecialchars($field) . ' field</h1><!--body content title-->
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                    </div><!--content div-->';
                    $headingDisplayed = true;
                }
                ?>

                <section>
                    <div class="container">
                        <div class="date col-md-1">
                            <span class="month" style="font-weight: 600;"><?php echo $eventDate; ?></span><br>
                            <hr class="line">
                            <span class="month"><?php echo $eventTime; ?></span><br>
                        </div>
                        <div class="col-md-4">
                            <img src="<?php echo htmlspecialchars($eventImage); ?>" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 class="title"><?php echo $eventTitle; ?></h1>
                            <p class="location">
                                A <?php echo $eventType; ?> event
                            </p>

                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#eventModal"
                                data-id="<?php echo $eventID; ?>" data-title="<?php echo $eventTitle; ?>"
                                data-date="<?php echo $eventDate; ?>" data-time="<?php echo $eventTime; ?>"
                                data-location="<?php echo $eventLocation; ?>" data-link="<?php echo $eventLink; ?>"
                                data-type="<?php echo $eventType; ?>" data-description="<?php echo $eventDescription; ?>">
                                View Details <span class="glyphicon glyphicon-arrow-right"
                                    aria-hidden="true"></span>
                            </button>
                            <!-- <a href="calendar.php">
                                <button type="button" class="btn btn-primary btn-lg">
                                    Add to My Events Calendar <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                                </button>
                            </a> -->
                            <br>
                        </div>
                        <hr class="customline2">
                        <br>
                    </div>
                    <hr class="customline2">
                    <br>
                </section>
                <?php
            }
        } else {
            echo '
            <div style="text-align: center; margin-top: 10%;">
                <img src="images/6195678.png" alt="No Events" style="width: 100px; height: auto; display: block; margin: 0 auto;">
                <p style="font-size: 20px;">No events found for this category</p>
                <a href="javascript:history.back()" style="display: inline-block; margin-top: 20px; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">Go Back</a>
            </div>';
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>

    <div id="eventModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="background-color: #f6f9ff;">
            <div class="modal-content" style="background-color: #f6f9ff;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Event Details</h4>

                </div>
                <div class="modal-body">
                    <h2 id="modalTitle"></h2>
                    <p id="modalDescription"></p>
                    <p><strong>Date:</strong> <span id="modalDate"></span></p>
                    <p><strong>Time:</strong> <span id="modalTime"></span></p>
                    <p><strong>Type:</strong> <span id="modalType"></span></p>

                    <p><strong>Location:</strong> <span id="modalLocation"></span></p>
                    <p><strong>Joining Link:</strong> <a id="modalLink" href="" target="_blank"
                            rel="noopener noreferrer">Join Now</a></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#eventModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var eventID = button.data('id'); 
            var eventTitle = button.data('title');
            var eventDate = button.data('date');
            var eventTime = button.data('time');
            var eventLocation = button.data('location');
            var eventDescription = button.data('description');
            var eventLink = button.data('link');
            var eventType = button.data('type');


            // Update the modal content
            var modal = $(this);
            modal.find('.modal-title').text('Event Details');
            modal.find('#modalTitle').text(eventTitle);
            modal.find('#modalDate').text(eventDate);
            modal.find('#modalTime').text(eventTime);
            modal.find('#modalLocation').text(eventLocation);
            modal.find('#modalDescription').text(eventDescription);
            modal.find('#modalLink').text(eventLink);
            modal.find('#modalType').text(eventType);

        });
    </script>
</body>

</html>