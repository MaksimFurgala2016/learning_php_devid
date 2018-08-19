<?php
/**
 * Created by PhpStorm.
 * User: furga
 * Date: 12.08.2018
 * Time: 23:08
 */
$user = 'root';
$password = '';
$db = new PDO('mysql:host=localhost;dbname=test', $user, $password);
$sql = $db->query('SELECT d.dish_name, d.price, d.is_spicy FROM dishes d ORDER BY price;');
$sql->execute();
$data = $sql->fetchAll();
//var_dump($data);
?>
<h4>Напишите программу, в которой все блюда, находящиеся в таблице dishes, перечисляются отсортированными по цене</h4>
<table>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Специи</th>
    </tr>
    <?php
    foreach ($data as $datum) {
        echo '<tr><td>'.$datum['dish_name'].'</td><td>'.$datum['price'].'</td><td>'.$datum['is_spicy'].'</td></tr>';
    }
    ?>
</table>
<!--<h4>2. Напишите программу, отображающую форму с запросом блюд по их цене. После передачи-->
<!--    формы на обработку программа должна вывести наименования и цены тех блюд, которые-->
<!--    стоят не меньше, чем указано в форме. Не извлекайте из таблицы базы данных строки или-->
<!--    столбцы, которые не подлежат выводу на экран.-->
<!--</h4>-->
<?php
///**
// * получить блюдо по цене
// * @param $price
// * @return array
// */
//function getDishes($price) {
//    global $db;
//    $sql = "SELECT d.dish_name, d.price FROM dishes d WHERE d.price >= ? ORDER BY price ASC ";
//    $query = $db->prepare($sql);
//    $query->execute([$price]);
//    $data = $query->fetchAll();
//    return $data;
//}
//
//?>
<?php
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $dish =  getDishBySelectName($_POST['dish_name']);
//    var_dump($dish);
//    echo implode('_', $dish);
//}
//?>
<!--<form action="index.php" method="post">-->
<!--    <label>Цена</label><br>-->
<!--    <input name="price" type="text" title="" placeholder="Введите цену блюда">-->
<!--    <button type="submit">Вывести блюдо</button>-->
<!--</form>-->
<!--<ul>-->
<?php
////if ($_SERVER['REQUEST_METHOD'] == 'POST') {
////    $array_dishes = getDishes($_POST['price']) ;
////    foreach ($array_dishes as $dish) {
////        echo "<li>".$dish['dish_name']."_цена:".$dish['price']."</li>";
////    }
////}
//?>
<!--</ul>-->
<h4>Напишите программу, отображающую форму со списком наименований блюд, размечаемым
дескриптором &lt;select&gt;. Составьте такой список из наименований блюд, извлеченных из базы
    данных. После передачи формы на обработку программа должна вывести из таблицы всю
    информацию о выбранном блюде, в том числе идентификатор, наименование, цену и наличие
    специй в данном блюде.
</h4>
<?php
function getDishBySelectName($dish_name) {
    global $db;
    $sql = "SELECT * FROM dishes d WHERE d.dish_name = ?;";
    $query = $db->prepare($sql);
    $query->execute(array($dish_name));
    $data = $query->fetch();
    return $data;
}
function getAll() {
    global $db;
    $sql = "SELECT * FROM dishes d;";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dish =  getDishBySelectName($_POST['dish_name']);
    var_dump($dish);
    echo "Id: ".$dish['dish_id']."<br>"."Имя: ".$dish['dish_name']."<br>"."Цена: ".$dish['price']."<br>";
}
?>
<form method="post" action="index.php">
    <label>Блюдо</label>
    <select name="dish_name" title="">
    <?php foreach (getAll() as $item) {
        echo "<option>".$item['dish_name']."</option>";
    }
    ?>
    </select>
    <button type="submit">Поиск информации</button>
</form>
