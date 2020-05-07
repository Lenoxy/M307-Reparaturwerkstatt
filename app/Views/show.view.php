<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Assignments</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>

<div class="buttonDiv">
    <span>Leo Scherer</span>
    <h1>WeBau</h1>
    <a href="create" class="button">Create new</a>
</div>
<form method="post" action="list">
    <table>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Werkzeug</th>
            <th>Abgeschlossen</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
        <?PHP
        foreach ($assignmentsReady as $a) {
            ?>
            <tr>
                <td><input type="checkbox" name="check_list[<?=$a['id']?>]"></td>
                <td><?PHP echo $a['name'] ?></td>
                <td><?PHP echo $a['werkzeug'] ?></td>
                <td><?PHP echo $a['abgeschlossen'] ?></td>
                <td><?PHP echo($a['status'] == 1 ? '👍' : '👎') ?></td>
                <td><a href="<?PHP echo $a['edit'] ?>">Edit</a></td>
            </tr>
        <?PHP } ?>
    </table>
    <input type="submit" value="Ausgewählte Abschliessen" class="button">
</form>


</body>
</html>