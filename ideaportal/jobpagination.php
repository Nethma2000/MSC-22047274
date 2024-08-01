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

$sql = "SELECT * FROM advisor_overview LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $start_from, $limit);
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
                            <a href="view-advisordetails.php?id=<?php echo htmlspecialchars($row['id_jobpost']); ?>">
                                <?php echo htmlspecialchars($row['jobtitle']); ?>
                            </a>
                            <span class="attachment-heading pull-right">Field: <?php echo htmlspecialchars($row['field']); ?></span>
                        </h4>
                        <br>
                        <div class="attachment-text">
                            <div>
                                <h4>
                                    <strong>
                                        <a href="view-advisordetails.php?id=<?php echo htmlspecialchars($row['id_jobpost']); ?>"></a>
                                        <span class="attachment-heading pull-left">Advising sections: <?php echo htmlspecialchars($row['components']); ?></span>
                                    </strong>
                                </h4>
                                <br>
                                <div>
                                    <strong>
                                        <a href="view-advisordetails.php?id=<?php echo htmlspecialchars($row['id_jobpost']); ?>"></a>
                                        <span class="attachment-heading pull-left">Experience: <?php echo htmlspecialchars($row['experience']); ?></span> years
                                    </strong>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        $stmt1->close();
    }
}

$stmt->close();
$conn->close();
?>
