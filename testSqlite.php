<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        //如果xx.db不存在的话则直接创建一个，存在的话直接使用。
        $this->open('test.db');
    }
}
$arr = array();
$db = new MyDB();
$result = $db->query('select * from test');
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $user_id = $row['id'];
    $name = $row['name'];
    array_push($arr, array('user_id' => $user_id, 'name' => $name));
}
$result = array('code' => 0, 'msg' => '', 'count' => 2, 'data' => $arr);
return json_encode($result);
//var_dump( $result->fetchArray() );
?>
