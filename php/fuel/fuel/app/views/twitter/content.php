<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php print $title ?></title>
</head>
<body>
    <p>Twitter!!</p>
    <div class='content'>
        <table width="100%" border="1">
            <?php foreach($query as $row): ?>
            <tr>
                <td><?php print $row['id']?></td>
                <td><?php print $row['content']?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
