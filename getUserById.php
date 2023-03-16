

<?php

$user_id = $_GET["user_id"];


//$conn
$mysqli = mysqli_connect("bj-cynosdbmysql-grp-nofx4lqu.sql.tencentcdb.com:25980","root","Lzqzxc,.","dainsai");

//如果有错误，存在错误号
if (mysqli_errno($mysqli)) {

    echo mysqli_error($mysqli);

    exit;
}
mysqli_set_charset($mysqli, 'utf8');   //选择字符集
$sql = "SELECT * FROM t_user where user_id = '$user_id';";
$result = mysqli_query($mysqli, $sql);


$arr = null;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $college = $row['college'];
        $class =  $row['class'];
        $phone = $row['phone'];
        $email = $row['email'];
        $gender =  $row['gender'];
        $description = $row['description'];
        $arr = array('user_id' => $user_id, 'name' => $name,'college' => $college,'class' => $class,'phone' => $phone,'email' => $email, 'gender' => $gender, 'decription' => $description);
    }
}

echo json_encode($arr);