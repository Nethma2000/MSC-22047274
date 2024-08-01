<?php
session_start();
require_once("db.php");

$limit = 4;

if (isset($_GET["page"])) {
    $page = intval($_GET['page']); 
} else {
    $page = 1;
}

$start_from = ($page - 1) * $limit;

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM advisor_overview WHERE 1=1";

if ($filter == 'field') {
    $sql .= " AND field = ?";
} elseif ($filter == 'experience') {
    $search = intval($search);
    $sql .= " AND experience >= ?";
} elseif ($filter == 'component') {
    $sql .= " AND components LIKE ?";
} else { 
    $sql .= " AND jobtitle LIKE ?";
}

$sql .= " LIMIT ?, ?";

$stmt = $conn->prepare($sql);

if ($filter == 'field') {
    $stmt->bind_param('sii', $search, $start_from, $limit);
} elseif ($filter == 'experience') {
    $stmt->bind_param('iii', $search, $start_from, $limit);
} elseif ($filter == 'component') {
    $search = "%$search%";
    $stmt->bind_param('sii', $search, $start_from, $limit);
} else { 
    $search = "%$search%";
    $stmt->bind_param('sii', $search, $start_from, $limit);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql1 = "SELECT * FROM advisor WHERE id_advisor = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $row['id_advisor']);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $prof_img = !empty($row1['prof_img']) ? '../advisors/uploads/logo/' . $row1['prof_img'] : '../images/defaultimage.png';
                ?>
                <div class="attachment-block clearfix">
                    <img class="attachment-img" src="<?php echo htmlspecialchars($prof_img); ?>" alt="Profile Image">
                    <div class="attachment-pushed">
                        <br>
                        <h4 class="attachment-heading">
                            <a href="view-advisordetails.php?id=<?php echo $row['id_jobpost']; ?>">
                                <?php echo htmlspecialchars($row['jobtitle']); ?>
                            </a>
                            <span class="attachment-heading pull-right">Field: <?php echo htmlspecialchars($row['field']); ?></span>
                        </h4>
                        <br>
                        <div>
                            <h4><strong>
                                <a href="view-advisordetails.php?id=<?php echo $row['id_jobpost']; ?>"></a>
                                <span class="attachment-heading pull-left">Advising sections: <?php echo htmlspecialchars($row['components']); ?></span>
                            </strong></h4>
                            <br>
                            <div>
                                <strong>
                                    <a href="view-advisordetails.php?id=<?php echo $row['id_jobpost']; ?>"></a>
                                    <span class="attachment-heading pull-left">Experience: <?php echo htmlspecialchars($row['experience']); ?></span> years
                                </strong>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <?php
            }
        }
    }
} else {
    echo "<p class='text-center'>No advisors found for the selected filter.</p>";
}


$conn->close();
?>
