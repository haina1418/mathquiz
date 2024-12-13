<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = $_POST['score'];

    $sql = "INSERT INTO quiz_scores (score) VALUES ('$score')";

    if ($conn->query($sql) === TRUE) {
        echo "Score recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

session_start();

function getRandomNumber($min, $max) {
    return rand($min, $max);
}

function generateQuestions($level, $operation, $num_questions, $max_diff) {
    $questions = [];
    $min = 1;
    $max = 10;

    if ($level == '11-100') {
        $min = 11;
        $max = 100;
    } elseif ($level == 'custom') {
        $min = $_POST['custom_min'];
        $max = $_POST['custom_max'];
    }

    for ($i = 0; $i < $num_questions; $i++) {
        $num1 = getRandomNumber($min, $max);
        $num2 = getRandomNumber($min, $max);
        $correct = 0;

        switch ($operation) {
            case 'addition':
                $correct = $num1 + $num2;
                $question = "$num1 + $num2 = ?";
                break;
            case 'subtraction':
                $correct = $num1 - $num2;
                $question = "$num1 - $num2 = ?";
                break;
            case 'multiplication':
                $correct = $num1 * $num2;
                $question = "$num1 x $num2 = ?";
                break;
        }

        $choices = [];
        $choices[] = $correct;
        for ($j = 0; $j < 3; $j++) {
            do {
                $choice = getRandomNumber($correct - $max_diff, $correct + $max_diff);
            } while (in_array($choice, $choices));
            $choices[] = $choice;
        }
        shuffle($choices);

        $questions[] = ['question' => $question, 'choices' => $choices, 'correct' => $correct];
    }

    return $questions;
}

$level = $_POST['level'];
$operation = $_POST['operation'];
$num_questions = $_POST['num_questions'];
$max_diff = $_POST['max_diff'];

$questions = generateQuestions($level, $operation, $num_questions, $max_diff);
$_SESSION['questions'] = $questions;

header("Location: displayQuiz.php");
exit;
?>