<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
</style>
</head>
<body>
    <h1>Simple Mathematics Quiz</h1>
    <form action="quiz.php" method="post">
        <fieldset>
            <label for="level">Level:</label><br>
            <input type="radio" id="level1" name="level" value="1-10">
            <label for="level1">Level 1 (1-10)</label><br>
            <input type="radio" id="level2" name="level" value="11-100">
            <label for="level2">Level 2 (11-100)</label><br>
            <input type="radio" id="custom" name="level" value="custom">
            <label for="custom">Custom Level</label>
            <input type="number" name="custom_min" placeholder="Min" min="1">
            <input type="number" name="custom_max" placeholder="Max" min="1"><br><br>

            <label for="operation">Operator:</label><br>
            <input type="radio" id="addition" name="operation" value="addition">
            <label for="addition">Addition</label><br>
            <input type="radio" id="subtraction" name="operation" value="subtraction">
            <label for="subtraction">Subtraction</label><br>
            <input type="radio" id="multiplication" name="operation" value="multiplication">
            <label for="multiplication">Multiplication</label><br><br>

            <label for="num_questions">Number of items:</label>
            <input type="number" id="num_questions" name="num_questions" min="1" value="5"><br><br>

            <label for="max_diff">Max Difference of choices from the correct answer:</label>
            <input type="number" id="max_diff" name="max_diff" min="1" value="10"><br><br>
        </fieldset>
        <input type="submit" value="Start Quiz">
    </form>
</body>
</html>
