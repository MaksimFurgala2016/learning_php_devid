<?php
/**
 * Created by PhpStorm.
 * User: furga
 * Date: 18.08.2018
 * Time: 14:47
 */
session_start();
$color_default = "silver";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['color'])) {
        $_SESSION['color'] = $_POST['color'];
        echo "Вы можете перейти на страницу <a href='background.php'>Фон</a>";
        session_destroy();
    }
    else {
        $_SESSION['color'] = $_POST['color'];
    }
}
?>
<form method="post" action="index.php">
    <label>Выберите цвет: </label>
    <select name="color" title="">
        <option value="red">Красный</option>
        <option value="green">Зеленый</option>
        <option value="yellow">Желтый</option>
    </select>
    <button type="submit">Применить</button>
</form>
<h4>Вы выбрали цвет:</h4>
<div style="width: 70px; height: 30px; background-color: <?php echo $_SESSION['color'] ??  $color_default?>">

</div>
