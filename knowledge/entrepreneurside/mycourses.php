<?php
session_start();
include('../../entrepreneurs/econfig.php');

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn, "SELECT id_user, email, name FROM entrepreneurs WHERE email='$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$loggedin_userid = $row['id_user'];

$row_num = 6;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $row_num;

$count_sql = mysqli_query($conn, "SELECT COUNT(*) as total FROM enrolments WHERE id_user = '$loggedin_userid'");
$count_row = mysqli_fetch_assoc($count_sql);
$row_count = $count_row['total'];

$last_page = ceil($row_count / $row_num);

$enrollments_sql = mysqli_query($conn, "SELECT c.course_id, c.title, c.description, c.cover, c.created_at
                                        FROM enrolments e
                                        JOIN course c ON e.course_id = c.course_id
                                        WHERE e.id_user = '$loggedin_userid'
                                        LIMIT $offset, $row_num");

$title = "My Enrolled Courses";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <!-- Header -->
    <h4 class="my-4">Enrolled Courses (<?= $row_count ?>)</h4>

    <!-- Course List -->
    <?php if (mysqli_num_rows($enrollments_sql) > 0) { ?>
        <div class="row">
            <?php while ($course = mysqli_fetch_assoc($enrollments_sql)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../Upload/thumbnail/<?= htmlspecialchars($course['cover']) ?>" class="card-img-top" alt="course image">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                            <p class="card-text"><small class="text-muted"><?= htmlspecialchars($course['created_at']) ?></small></p>
                            <!-- <a href="courseview.php?course_id=<?= htmlspecialchars($course['course_id']) ?>" class="btn btn-primary">View Course</a> -->
                        
                            <a href="mycourse-Enrolled.php?course_id=<?=$course['course_id']?>&id_user=<?=$loggedin_userid?>" class="btn btn-primary">View Course</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-info" role="alert">
            0 courses record found in the database
        </div>
    <?php } ?>

    <?php if ($last_page > 1) { ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1) { ?>
                    <li class="page-item"><a class="page-link" href="mycourses.php?page=<?= $page - 1 ?>">Prev</a></li>
                <?php } else { ?>
                    <li class="page-item disabled"><span class="page-link">Prev</span></li>
                <?php } ?>

                <?php for ($i = max(1, $page - 3); $i <= min($last_page, $page + 3); $i++) { ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="mycourses.php?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>

                <?php if ($page < $last_page) { ?>
                    <li class="page-item"><a class="page-link" href="mycourses.php?page=<?= $page + 1 ?>">Next</a></li>
                <?php } else { ?>
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                <?php } ?>
            </ul>
        </nav>
    <?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
