<?php
include "conn.php";
session_start();
$questions = $_SESSION['questions'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
    <h1>Simple Mathematics Quiz</h1>
    <form action="result.php" method="post">
        <?php foreach ($questions as $index => $question): ?>
            <p><?php echo ($index + 1) . ". " . $question['question']; ?></p>
            <?php foreach ($question['choices'] as $choice): ?>
                <label>
                    <input type="radio" name="question<?php echo $index; ?>" value="<?php echo $choice; ?>">
                    <?php echo $choice; ?>
                </label>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <input type="submit" value="Submit Quiz">
    </form>
</body>
</html>
