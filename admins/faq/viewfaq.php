<link rel="stylesheet" type="text/css" href="faqcss/bootstrap.css" />
          <link rel="stylesheet" type="text/css" href="faqfont-awesome/css/font-awesome.css" />
          <link rel="stylesheet" type="text/css" href="faqrichtext/richtext.min.css" />
      
        <title>FAQ Section - Add FAQ</title>
      
      
          <script src="faqjs/jquery-3.3.1.min.js"></script>
          <script src="faqjs/bootstrap.js"></script>
          <script src="faqrichtext/jquery.richtext.js"></script>


<div class="row">
            <div  class="offset-md-2 col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="color: purple;">ID</th>
                            <th style="color: purple;">Question</th>
                            <th style="color: purple;">Answer</th>
                            <th style="color: purple;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php foreach ($faqs as $faq) : ?>
                            <tr>
                                <td><?php echo $faq["id"]; ?></td>
                                <td><?php echo $faq["question"]; ?></td>
                                <td><?php echo $faq["answer"]; ?></td>
                                <td>
                                    <a style="background-color: #0eb082;color:white" href="editFAQ.php?id=<?php echo $faq['id']; ?>" class="btn btn- btn-sm">
                                        Edit
                                    </a>

                                    <form method="POST" action="deleteFAQ.php" onsubmit="return confirm('Are you sure you want to delete this FAQ ?');">
                                        <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
                                        <input type="submit" value="Delete" style="background-color: #d13c0f;color:white" class="btn btn- btn-sm" />
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>