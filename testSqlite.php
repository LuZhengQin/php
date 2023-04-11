<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        //如果xx.db不存在的话则直接创建一个，存在的话直接使用。
        $this->open('db/diansai.db');
    }
}

$db = new MyDB();
$result = $db->query('select * from test');
var_dump( $result->fetchArray() );
?>
