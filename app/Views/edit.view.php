<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Assignments</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>

<form action="handle-edit" method="post">
    <fieldset>
        <input type="hidden" name="id" value="<?PHP echo $assignment->assignmentId ?>">


        <label for="name">Name *</label>
        <input type="text" id="name" name="name" required value="<?PHP echo $assignment->name ?>">

        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required value="<?PHP echo $assignment->email ?>">

        <label for="phone">Telefon</label>
        <input type="tel" id="phone" name="phone" value="<?PHP echo $assignment->phone ?>">
    </fieldset>

    <fieldset>
        <label for="tool">Werkzeug</label>
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

        <label for="state">Status</label>
        <select id="state" name="state">
            <option value="0" <?PHP echo $assignment->state == 0 ? 'selected' : '' ?>>Offen</option>
            <option value="1" <?PHP echo $assignment->state == 1 ? 'selected' : '' ?>>Geschlossen</option>
        </select>
    </fieldset>

    <?PHP if(isset($errors)){ ?>
        <div class="errorBox">
            <?PHP
            foreach ($errors as $error) { ?>
                <p class="error"><?PHP echo $error ?></p>
            <?PHP } ?>
        </div>
    <?PHP } ?>


    <input type="submit" value="Absenden">
</form>

</body>
</html>