<?php
/**
 * Created by PhpStorm.
 * User: furga
 * Date: 19.08.2018
 * Time: 9:55
 */
?>
<h5>
    1)По адресу http://php.net/releases/?json находится лента подачи информации в фор-
    мате JSON о последних выпусках версий языка РНР. Напишите программу, в которой функция
    file_get_contents() используется для извлечения из этой ленты и последующего вывода
    на экран информации о последней выпущенной версии языка РНР.
</h5>
<?php
$url = 'http://php.net/releases/?json';
$response = file_get_contents($url);
$info_1 = json_decode($response);
echo '<h6>Дессериализация</h6>';
foreach ($info_1 as $item => $value) {
    if ($item == '7') {
        foreach ($value->source as $key => $item_arr) {
            if ($key == 2) {
                echo $item_arr->filename.'<br>'.$item_arr->name.'<br>'.$item_arr->sha256.'<br>'.$item_arr->date;
            }
        }
    }
}
?>
<h5>
    2)Видоизмените программу из предыдущего упражнения, чтобы воспользоваться расширением
    cURL вместо функции file_get_contents().
</h5>
<?php
$url = 'http://php.net/releases/?json';
$resource = curl_init($url);
var_dump($resource);
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
$info_2 = curl_exec($resource);//выполнить запрос url
$result_json = json_decode($info_2);//дкодер json
var_dump($info_2);
var_dump($result_json);
echo '<h6>Дессериализация</h6>';
foreach ($result_json as $item => $value) {
    if ($item == '7') {
        foreach ($value->source as $key => $item_arr) {
            if ($key == 2) {
                echo $item_arr->filename.'<br>'.$item_arr->name.'<br>'.$item_arr->sha256.'<br>'.$item_arr->date;
            }
        }
    }
}
?>