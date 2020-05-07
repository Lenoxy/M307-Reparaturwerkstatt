<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Assignments</title>
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
    <h1>WeBau - Bearbeiten</h1>
    <span>Leo Scherer</span>
</div>

<div class="centerFlexbox">

    <form action="handle-edit" method="post" class="centerWidth">
        <fieldset>
            <input type="hidden" name="id" value="<?PHP echo $assignment->assignmentId ?>">

            <span>
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" required value="<?PHP echo $assignment->name ?>">
            </span>
            <span>
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required value="<?PHP echo $assignment->email ?>">
            </span>
            <span>
                <label for="phone">Telefon</label>
                <input type="tel" id="phone" name="phone" value="<?PHP echo $assignment->phone ?>">
            </span>
        </fieldset>

        <fieldset>
            <span>
                <label for="dringlichkeit">Dringlichkeit</label>
                <input type="text" readonly id="dringlichkeit" value="<?PHP echo $assignment->urgency->name ?>">
            </span>
            <span>
                <input type="hidden" id="urgency" value="<?PHP echo $assignment->urgency->daysNeeded ?>">
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
                        <?php if ($t->id != $assignment->tool->id) { ?>
                            <option value="<?PHP echo $t->id ?>"><?PHP echo $t->name ?></option>
                        <?PHP } else { ?>
                            <option selected value="<?PHP echo $t->id ?>"><?PHP echo $t->name ?></option>
                        <?PHP } ?>
                    <?PHP } ?>
                </select>
            </span>

            <span>
                <label for="state">Status *</label>
                <select id="state" name="state">
                    <option value="0" <?PHP echo $assignment->state == 0 ? 'selected' : '' ?>>Offen</option>
                    <option value="1" <?PHP echo $assignment->state == 1 ? 'selected' : '' ?>>Geschlossen</option>
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