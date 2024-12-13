<?php
include "conn.php";
session_start();
$questions = $_SESSION['questions'];
$score = 0;
$num_correct = 0;
$num_wrong = 0;
$total_questions = count($questions);

foreach ($questions as $index => $question) {
    if (isset($_POST["question$index"]) && $_POST["question$index"] == $question['correct']) {
        $score++;
        $num_correct++;
    } else {
        $num_wrong++;
    }
}
function calculate_average($score, $total_questions) {
    if ($total_questions > 0) {
        return $score / $total_questions * 100;
    } else {
        return 0;
    }
}

$average = calculate_average($score, $total_questions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Quiz Results</h1>
    <p>Score: <?php echo $score; ?>/<?php echo $total_questions; ?></p>
    <p>Correct: <?php echo $num_correct; ?></p>
    <p>Wrong: <?php echo $num_wrong; ?></p>
    <p>Grade: <?php echo round($average, 2); ?>%</p>
    <a href="index.php">Retake Quiz</a>
    <form action="quiz.php" method="post">
        <fieldset>
            <label for="score">Score:</label>
            <input type="number" id="score" name="score" min="0" required><br><br>
        </fieldset>
        <input type="submit" value="Submit Score">
    </form>
</body>
</html>
