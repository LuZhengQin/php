<?php
error_reporting(0);

if ( (($_COOKIE['username']) != null)  && (($_COOKIE['password']) != null) ) {
    $userName = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    //从db获取用户信息
    //PS：数据库连接信息改成自己的 分别为主机 数据库用户名 密码
    $conn = mysqli_connect("bj-cynosdbmysql-grp-nofx4lqu.sql.tencentcdb.com:25980","root","Lzqzxc,.","dainsai");
    $res = mysqli_query($conn,"select * from admin where name =  '$userName' ");
    $row = mysqli_fetch_assoc($res);
    if ($row['password'] == $password) {
        //验证通过后跳转到登录后的欢迎页面
        echo "<script>alert('登陆成功');location.href='adminIndex.php';</script>";
    }
}

//第一次登陆的时候，通过用户输入的信息来确认用户

    $userName = $_POST['username'];
    $password = $_POST['password'];
    //从db获取用户信息
    $conn = mysqli_connect("bj-cynosdbmysql-grp-nofx4lqu.sql.tencentcdb.com:25980","root","Lzqzxc,.","dainsai");

    $sql = "select name,password from admin where name = '$userName' and password='$password'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
     if	($row['name']!=$userName) {
         $arr = array('status' => 500);
         echo json_encode($arr);
     }
     else if($row['name']==$userName&&$row['password']!=$password)
     {
         $arr = array('status' => 500);
         echo json_encode($arr);
     }
     else if($row['name']==$userName&&$row['password'] ==$password) {
         //如果密码验证通过，设置一个cookies，把用户名保存在客户端
         setcookie('username',$userName,time()+3600);//设置一个小时
         //最后跳转到登录后的欢迎页面
         $arr = array('status' => 200);
         echo json_encode($arr);
     }

  



?>

