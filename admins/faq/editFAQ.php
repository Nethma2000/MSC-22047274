<?php
 

$conn = new PDO("mysql:host=localhost;dbname=startupcompanion", "root", "");
 
    // check if FAQ exists
    $sql = "SELECT * FROM faqs WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_REQUEST["id"]
    ]);
    $faq = $statement->fetch();
 
    if (!$faq)
    {
        die("FAQ not found");
    }
 
// check if edit form is submitted
if (isset($_POST["submit"]))
{

    $sql = "UPDATE faqs SET question = ?, answer = ? WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_POST["question"],
        $_POST["answer"],
        $_POST["id"]
    ]);
 
 header("Location:addFAQ.php");

    // header("Location: " . $_SERVER["HTTP_REFERER"]);
}

 
?>

<link rel="stylesheet" type="text/css" href="faqcss/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="faqfont-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="faqrichtext/richtext.min.css" />

<script src="faqjs/jquery-3.3.1.min.js"></script>
<script src="faqjs/bootstrap.js"></script>
<script src="faqrichtext/jquery.richtext.js"></script>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <h1 class="text-center">Edit FAQ</h1>
 
            <form method="POST" action="editFAQ.php">
 
                <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
 
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" class="form-control" value="<?php echo $faq['question']; ?>" required />
                </div>
 
                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" id="answer" class="form-control" required><?php echo $faq['answer']; ?></textarea>
                </div>
 
         
                <input type="submit" name="submit" class="btn btn-warning" value="Edit FAQ" />
            </form>
        </div>
    </div>
</div>
 
<script>
    // initialize rich text library
    window.addEventListener("load", function () {
        $("#answer").richText();
    });
</script>