<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>StartupCompanion | Navigate your startup journey</title>
    <link rel="stylesheet" type="text/css" href="../advisors/advisorscrud/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../advisors/advisorscrud/datatable/dataTable.bootstrap.min.css">
    <link rel="icon" href="../assets/img/logo1.jpg" type="image/jpg" sizes="150x130">
    <style>
        .height10 {
            height: 10px;
        }
        .mtop10 {
            margin-top: 10px;
        }
        .modal-label {
            position: relative;
            top: 7px;
        }
        body {
            background-color: #f6f9ff;
        }
    </style>
</head>
<body>
    
<h1 style="background-color: #0096FF; height: 70px; text-align: center; padding-top: 15px; color: black; font-weight: bold" class="page-header text-center">Manage Inquiries</h1>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
            <?php
                if(isset($_SESSION['error'])){
                    echo "
                    <div class='alert alert-danger text-center'>
                        <button class='close'>&times;</button>
                        ".$_SESSION['error']."
                    </div>
                    ";
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                    echo "
                    <div class='alert alert-success text-center'>
                        <button class='close'>&times;</button>
                        ".$_SESSION['success']."
                    </div>
                    ";
                    unset($_SESSION['success']);
                }
            ?>
            </div>

            </div>
            <div class="height10"></div>
            <div class="row">
                <table style="margin-left: -10px;" id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php
                            include_once('inqconnection.php');
                            $sql = "SELECT * FROM inquiries";
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $inqid = $row['inquiry_id'];
                                $status = $row['status'];
                                $disabled = $status == 1 ? 'disabled' : '';
                                echo "
                                <tr>
                                    <td>".$row['inquiry_id']."</td>
                                    <td>".$row['inquiry_name']."</td>
                                    <td>".$row['inquiry_subject']."</td>
                                    <td>".$row['inquiry_email']."</td>
                                    <td>".$row['inquiry_message']."</td>
                                    <td>
                                        <a href='mailto:".$row['inquiry_email']."' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span> Reply</a>
                                        <button class='btn btn-warning btn-sm mark-as-replied' data-id='".$inqid."' $disabled>Mark as Replied</button>
                                    </td>
                                    <td>".($status == 1 ? 'Replied' : 'Pending')."</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="../advisors/advisorscrud/jquery/jquery.min.js"></script>
<script src="../advisors/advisorscrud/bootstrap/js/bootstrap.min.js"></script>
<script src="../advisors/advisorscrud/datatable/jquery.dataTables.min.js"></script>
<script src="../advisors/advisorscrud/datatable/dataTable.bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();

    $(document).on('click', '.close', function(){
        $('.alert').hide();
    });

    $(document).on('click', '.mark-as-replied', function() {
        var inquiryId = $(this).data('id');
        var button = $(this);

        $.ajax({
            url: 'mark_as_replied.php',
            type: 'POST',
            data: {id: inquiryId},
            success: function(response) {
                if(response == 'success') {
                    button.prop('disabled', true);
                    button.closest('tr').find('td:last').text('Replied');
                } else {
                    alert('Failed to mark as replied.');
                }
            }
        });
    });
});
</script>
</body>
</html>
