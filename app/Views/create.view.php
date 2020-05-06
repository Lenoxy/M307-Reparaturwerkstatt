<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Assignments</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<form action="handle-create" method="post">
    <fieldset>
        <label for="name">Name *</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Telefon</label>
        <input type="tel" id="phone" name="phone">
    </fieldset>

    <fieldset>
        <label for="urgency">Dringlichkeit</label>
        <select id="urgency" name="urgency">
            <?php
            foreach ($urgencies as $u) {
                ?>
                <option value="<?PHP echo $u->urgencyId ?>"><?PHP echo $u->name ?></option>
            <?PHP } ?>
        </select>

        <label for="tool">Werkzeug</label>
        <select id="tool" name="tool">
            <?php
            foreach ($tools as $t) {
                ?>
                <option value="<?PHP echo $t->id ?>"><?PHP echo $t->name ?></option>
            <?PHP } ?>
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