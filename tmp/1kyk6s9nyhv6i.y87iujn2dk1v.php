<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Midterm Survey</title>
</head>
<body>
<div>
    <form method="post" action="summary">
        <h1>Midterm Survey</h1>

        <label>Name</label>
        <input type="text" id="name" name="name">
        <br>
        <br>

        <label>Check all that apply</label>
        <br>
        <br>
        <?php foreach (($midterms?:[]) as $midterm): ?>
            <label>
                <input type="checkbox" name="<?= ($midterm) ?>" value="<?= ($midterm) ?>">
                <?= ($midterm)."
" ?>
            </label>
            <br>
        <?php endforeach; ?>
        <br>
        <br>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>