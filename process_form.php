<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startup Field Predictor</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        /* Modal container */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #72EDF2 10%, #5151E5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Modal content */
        .modal-content {
            background-color: #F0FFFF	;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            max-height: 80%;
            overflow-y: auto;
            line-height: 1.4; 

        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        /* Modal header */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Modal body */
        .modal-body {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Modal Structure -->
    <div id="predictionModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="color:#191970;" id="modalTitle">Your Suitable Startup Field</h1>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <p id="modalPrediction"></p>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("predictionModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
            window.location.href = "predictform.html"; // Redirect to form.html

        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                window.location.href = "predictform.html"; // Redirect to form.html

            }
        }

        // Function to show the modal with the prediction
        function showPrediction(prediction) {
            document.getElementById("modalPrediction").innerText = prediction;
            modal.style.display = "flex";  // Ensure modal is displayed as flex for centering
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $responses = [];
        for ($i = 1; $i <= 10; $i++) {
            if (isset($_POST["q$i"])) {
                $responses[] = $_POST["q$i"];
            } else {
                echo "<script>alert('Error: Please answer all questions.');</script>";
                exit();
            }
        }

        $api_key = "";
        $prompt = "Based on the following responses, predict the suitable startup field: " . implode(", ", $responses);
        
        $fields = [
            "Agriculture and Food-Tech",
            "Consumer Goods",
            "Creative Arts and Media",
            "Education",
            "Entertainment",
            "Health and Wellness",
            "Hospitality and Tourism",
            "Manufacturing and Industry",
            "Real Estate and Property Management",
            "Retail and E-commerce",
            "Social Impact and Nonprofit",
            "Technology",
            "Transportation and Logistics"
        ];
        
        $system_message = "You are an assistant that helps predict suitable startup fields based on user responses. The fields you should consider are: " . implode(", ", $fields) . ".";
        // $system_message = "You are an assistant that helps predict suitable startup fields based on user responses. The fields you should consider are: " . implode(", ", $fields) . ". Provide not only the prediction but also example startups they can start, tips for starting a business, and any other relevant information.";


        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $system_message],
                ['role' => 'user', 'content' => $prompt]
            ],
            'max_tokens' => 250
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        ]);
        
        $result = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo "<script>alert('Error: " . curl_error($ch) . "');</script>";
        } else {
            $response = json_decode($result, true);
            if (isset($response['choices']) && isset($response['choices'][0]['message']['content'])) {
                $prediction = $response['choices'][0]['message']['content'];
                echo "<script type='text/javascript'>showPrediction('" . addslashes($prediction) . "');</script>";
            } else {
                echo "<script type='text/javascript'>showPrediction('Unexpected response from API. Please try again later.');</script>";
            }
        }
        
        curl_close($ch);
    }
    ?>
</body>
</html>
