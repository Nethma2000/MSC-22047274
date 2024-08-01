<?php

require_once 'classes/Event.php';
require_once 'classes/EventTableGateway.php';
require_once 'classes/Connection.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();

?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>StartupCompanion | Navigate your startup journey</title>
    <link href="../assets/img/logo1.jpg" rel="icon" style="width: 150px; height: 130px;">
    <?php require 'utils/styles.php'; ?>
    <?php require 'utils/scripts.php'; ?>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            max-width: 800px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .close-delete {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-delete:hover,
        .close-delete:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>





    <?php require 'utils/header.php'; ?>
    <div class="content">
        <div class="container">
            <?php
            if (isset($message)) {
                echo '<p>' . $message . '</p>';
            }
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Field</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php



                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        if ($row['owner_id'] == $loggedin_ownerid) {
                            echo '<tr>';
                            echo '<td>' . $row['eventID'] . '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['field'] . '</td>';
                            echo '<td>' . $row['type'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td><a href="' . $row['link'] . '">Link</a></td>';
                            echo '<td><img src="' . $row['img'] . '" alt="Event Image" width="100" height="100"></td>';
                            echo '<td>'
                                // . '<a href="#" class="edit" data-id="'.$row['eventID'].'">Edit</a> '
// . '<a href="editEvent.php?eventID='.$row['eventID'].'" class="edit" data-id="'.$row['eventID'].'">Edit</a> '
                    
                                . '<a href="#" class="delete" data-id="' . $row['eventID'] . '">Delete</a> '
                                . '</td>';
                            echo '</tr>';

                        }

                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>

            <button id="openModalBtn" class="btn btn-default">Create Event</button>

            <!-- The Create Event Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Create Event</h2>
                    <h6></h6>

                    <form action="createevent.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" id="title" name="owner_id" value="<?php echo $loggedin_ownerid; ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time:</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="field">Field:</label>


                            <select name="field" required="true">

                                <option value="Agriculture and Food-Tech">Agriculture and Food-Tech</option>
                                <option value="Consumer Goods">Consumer Goods</option>
                                <option value="Creative Arts and Media">Creative Arts and Media</option>
                                <option value="Education">Education</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Health and Wellness">Health and Wellness</option>
                                <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                <option value="Manufacturing and Industry">Manufacturing and Industry</option>
                                <option value="Real Estate and Property Management">Real Estate and Property Management
                                </option>
                                <option value="Retail and E-commerce">Retail and E-commerce</option>
                                <option value="Social Impact and Nonprofit">Social Impact and Nonprofit</option>
                                <option value="Technology">Technology</option>
                                <option value="Transportation and Logistics">Transportation and Logistics</option>



                            </select>
                        </div>


                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select id="type" name="type" required>
                                <option value="" disabled selected>Select Type</option>

                                <option value="physical">Physical</option>
                                <option value="online">Online</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" id="location" name="location">
                        </div>
                        <div class="form-group">
                            <label for="link">Link:</label>
                            <input type="url" id="link" name="link">
                        </div>
                        <div class="form-group">
                            <label for="img">Upload Image:</label>
                            <input type="file" id="img" name="img" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <button type="submit">Create Event</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- The Delete Event Modal -->
            <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <span class="close-delete">&times;</span>
                    <h2>Delete Event</h2>
                    <p>Are you sure you want to delete this event?</p>
                    <form id="deleteForm" method="post" action="">
                        <input type="hidden" name="eventID" id="deleteEventID">
                        <div class="form-group">
                            <button type="submit">Delete</button>
                            <br>
                            <button type="button" class="close-delete">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



    <script>
        // Get the modals and their elements
        var modal = document.getElementById("myModal");
        var deleteModal = document.getElementById("deleteModal");

        var btn = document.getElementById("openModalBtn");
        var span = document.getElementsByClassName("close")[0];
        var deleteSpan = document.getElementsByClassName("close-delete")[0];

        var deleteForm = document.getElementById("deleteForm");
        var deleteEventIDInput = document.getElementById("deleteEventID");


        // Open the create event modal
        btn.onclick = function () {
            modal.style.display = "block";
        }


        // Close the create event modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        deleteSpan.onclick = function () {
            deleteModal.style.display = "none";
        }

        document.querySelectorAll('.close-delete').forEach(function (button) {
            button.onclick = function () {
                deleteModal.style.display = "none";
            }
        });




        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == deleteModal) {
                deleteModal.style.display = "none";
            }
        }

        // Show the delete confirmation modal
        document.querySelectorAll('.delete').forEach(function (link) {
            link.onclick = function (event) {
                event.preventDefault(); // Prevent default link behavior
                var eventID = this.getAttribute('data-id');
                deleteEventIDInput.value = eventID;
                deleteForm.action = 'deleteEvent.php?id=' + eventID;
                deleteModal.style.display = "block";
            }
        });



    </script>

    <script>
        function updateFields() {
            const type = document.getElementById('type').value;
            const locationField = document.getElementById('location');
            const linkField = document.getElementById('link');

            if (type === 'online') {
                locationField.removeAttribute('required');
                linkField.setAttribute('required', 'required');
            } else if (type === 'physical') {
                locationField.setAttribute('required', 'required');
                linkField.removeAttribute('required');
            } else if (type === 'hybrid') {
                locationField.setAttribute('required', 'required');
                linkField.setAttribute('required', 'required');
            } else {
                locationField.removeAttribute('required');
                linkField.removeAttribute('required');
            }
        }

        window.onload = function () {
            document.getElementById('type').addEventListener('change', updateFields);
        }
    </script>
</body>

</html>