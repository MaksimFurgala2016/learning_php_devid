<html>
<!DOCTYPE html>
<head>
    <title>PHP</title>
    <meta charset="utf-8">
</head>
<body>
<?php
$user = 'root';
$password = '';
$db_connect = new PDO('mysql:host=localhost;dbname=test', $user, $password);
$sql = $db_connect->query('SELECT u.login, u.password FROM users u;');
//$sql_upd = $db_connect->query('UPDATE users SET login=777 WHERE password="f23tgsds"');
$sql->execute();
//$sql_upd->execute();
$data = $sql->fetchAll();//array
?>
<table>
    <tr>
        <th>Логин</th>
        <th>Пароль</th>
    </tr>
    <?php foreach ($data as $datum) {?>
        <tr>
            <td><? echo $datum['login']?></td><td><? echo $datum['password']?></td>
        </tr>
    <?php }?>
</table>
<?php
//$sql_1 = $db_connect->query('SELECT u.login, u.password FROM users u;');
//$sql_2 = $db_connect->query('UPDATE users SET login=111 WHERE password="f23tgsds";');
//$sql_3 = $db_connect->query('INSERT INTO users (login, password) VALUES ("sc3cwfw2","34rfds2");');
//$sql_4 = $db_connect->query('DELETE FROM users WHERE login=222');
?>
</body>
</html>