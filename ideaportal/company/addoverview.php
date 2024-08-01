<?php
include('../../databaseconnection.php');
include('advisorsession.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jobtitle = $conn->real_escape_string($_POST['jobtitle']);
    $description = $conn->real_escape_string($_POST['description']);
    $field = $conn->real_escape_string($_POST['field']);
    $components = $conn->real_escape_string($_POST['components']);
    $experience = $conn->real_escape_string($_POST['experience']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);

    // Check if a record already exists for this advisor
    $check_sql = "SELECT * FROM advisor_overview WHERE id_advisor='$loggedin_advisor_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Update existing record
        $update_sql = "UPDATE advisor_overview SET jobtitle='$jobtitle', description='$description', field='$field', components='$components', experience='$experience', linkedin='$linkedin' WHERE id_advisor='$loggedin_advisor_id'";

        if ($conn->query($update_sql) === TRUE) {
            echo '<html><head><link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"></head>';
            echo '<body>';
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your data has been successfully updated.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>';
            echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
            echo '<script type="text/javascript">
                    setTimeout(function() {
                       window.location.href = "h.php";
                    }, 3000); // 3 seconds delay
                  </script>';
            echo '</body></html>';
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Insert new record
        $insert_sql = "INSERT INTO advisor_overview (id_advisor, jobtitle, description, field, components, experience, linkedin) 
                VALUES ('$loggedin_advisor_id', '$jobtitle', '$description', '$field', '$components', '$experience', '$linkedin')";

        if ($conn->query($insert_sql) === TRUE) {
            echo '<html><head><link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"></head>';
            echo '<body>';
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your data has been successfully inserted.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>';
            echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
            echo '<script type="text/javascript">
                    setTimeout(function() {
                       window.location.href = "h.php";
                    }, 3000); // 3 seconds delay
                  </script>';
            echo '</body></html>';
            exit();
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }

    $conn->close();
}
?>
