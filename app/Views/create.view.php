<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Assignments</title>
    <link rel="stylesheet" href="public/css/app.css">
    <script src="public/js/app.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            calculateDeadline();
        });
    </script>
</head>
<body>

<div class="buttonDiv">
    <a href="list" class="button">< Back</a>
    <h1>WeBau - Erstellen</h1>
    <span>Leo Scherer</span>
</div>

<div class="centerFlexbox">
    <form action="handle-create" method="post">
        <fieldset>
        <span>
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" required>
        </span>

            <span>
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required>
        </span>
            <span>
            <label for="phone">Telefon</label>
            <input type="tel" id="phone" name="phone">
        </span>
        </fieldset>

        <fieldset>
            <span>
                <label for="urgency">Dringlichkeit *</label>
                <select id="urgency" name="urgency" onchange="calculateDeadline()">
                    <?php
                    foreach ($urgencies as $u) {
                        ?>
                        <option value="<?PHP echo $u->daysNeeded ?>"><?PHP echo $u->name ?></option>
                    <?PHP } ?>
                </select>
            </span>

            <span>
                <label>Fertig bis</label>
                <input readonly id="deadlineDate">
            </span>

            <span>
            <label for="tool">Werkzeug *</label>
            <select id="tool" name="tool">
                <?php
                foreach ($tools as $t) {
                    ?>
                    <option value="<?PHP echo $t->id ?>"><?PHP echo $t->name ?></option>
                <?PHP } ?>
            </select>
        </span>
        </fieldset>

        <?PHP if (isset($errors)) { ?>
            <div class="errorBox">
                <?PHP
                foreach ($errors as $error) { ?>
                    <p class="error"><?PHP echo $error ?></p>
                <?PHP } ?>
            </div>
        <?PHP } ?>

        <input type="submit" value="Absenden">
    </form>
</div>

</body>
</html>