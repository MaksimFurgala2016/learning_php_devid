<?php
/**
 * Created by PhpStorm.
 * User: furga
 * Date: 12.08.2018
 * Time: 13:29
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST['noodle'].'<br>';
    foreach ($_POST['sweet'] as $key=>$value) {
        echo $value.'<br>';
    }
    echo $_POST['sweet_q'].'<br>';
}
var_dump($_POST['noodle']);
var_dump($_POST['sweet']);
?>
<h3>Что будет содержать массив $_POST</h3>
<form method="POST" action="index.php">
    Braised Noodles with: <select name="noodle" title="">
        <option>crab meat</option>
        <option>mushroom</option>
        <option>barbecued pork</option>
        <option>shredded ginger and green onion</option>
    </select>
    <br/>
    Sweet: <select name="sweet[]" multiple title="">
        <option value="puff"> Sesame Seed Puff
        <option value="square"> Coconut Milk Gelatin Square
        <option value="cake"> Brown Sugar Cake
        <option value="ricemeat"> Sweet Rice and Meat
    </select>
    <br/>
    Sweet Quantity: <input type="text" name="sweet_q" title="">
    <br/>
    <input type="submit" name="submit" value="Order">
</form>
