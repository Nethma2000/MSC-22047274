<?php
// Assuming you have set up your OpenAI API credentials
// $openai_api_key = 'sk-proj-OKrlwj8wv24QpQ557SUYT3BlbkFJMWUC20SGR5prOW52BOi0';

// Collect user's answers from the form
$q1 = isset($_POST['q1']) ? $_POST['q1'] : ''; 
$q2 = isset($_POST['q2']) ? $_POST['q2'] : ''; 
$q3 = isset($_POST['q3']) ? $_POST['q3'] : ''; 
$q4 = isset($_POST['q4']) ? $_POST['q4'] : ''; 
$q5 = isset($_POST['q5']) ? $_POST['q5'] : ''; 
$q6 = isset($_POST['q6']) ? $_POST['q6'] : ''; 
$q7 = isset($_POST['q7']) ? $_POST['q7'] : ''; 
$q8 = isset($_POST['q8']) ? $_POST['q8'] : ''; 
$q9 = isset($_POST['q9']) ? $_POST['q9'] : ''; 
$q10 = isset($_POST['q10']) ? $_POST['q10'] : ''; 

// Prepare the input prompt for OpenAI based on user's answers
$input_prompt = "User is interested in working with $q1. They are $q2, prefer $q3, and are interested in $q4 tasks. They enjoy solving complex problems ($q5), are $q6 in leadership roles, $q7 with public speaking, and prefer working $q8. They are $q9 in working with technology and $q10 with numbers.";

// Make a request to OpenAI API to get career prediction
$url = 'https://api.openai.com/v1/chat/completions';
$data = array(
    'prompt' => $input_prompt,
    'model' => 'gpt-3.5-turbo-instruct', // Use appropriate model
    'max_tokens' => 50 // Adjust based on your requirements
);
$options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n" .
                    "Authorization: Bearer " . $openai_api_key . "\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Handle response from OpenAI
if ($result === FALSE) {
    echo "Something went wrong. Please try again!"
    // Handle error
} else {
    $response = json_decode($result, true);
    $prediction = $response['choices'][0]['text'];
    // Display the predicted career field to the user
    echo "<h2>Predicted Career Field:</h2>";
    echo "<p>$prediction</p>";


    
}
?>
