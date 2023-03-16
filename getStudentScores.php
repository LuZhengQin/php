<?php
header("Access-Control-Allow-Origin:*");

function getStudentScores($mysqli)
{
    $arr = array();
    $sql = "SELECT * FROM sc;";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cid = $row['cid'];
            $sid = $row['sid'];
            $score = $row['score'];
            $sql1 = "SELECT * FROM student where stuid = '$sid';";
            $sql2 = "SELECT * FROM course where cosid = '$cid';";
            $result1 = $mysqli->query($sql1);
            $result2 = $mysqli->query($sql2);
            $stuname =null;
            $cosname = null;
            $coscredit = null;
            if ($result1->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $stuname = $row['stuname'];
                }
            }
            if ($result2->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cosname = $row['cosname'];
                    $coscredit = $row['coscredit'];
                }
            }
            array_push($arr, array('cid' => $cid, 'cosname' => $cosname, 'coscredit' => $coscredit, 'stuname' => $stuname, 'sid' => $sid, 'score' => $score));
        }
    }
    return $arr;
}

//$conn
$mysqli = mysqli_connect("bj-cynosdbmysql-grp-nofx4lqu.sql.tencentcdb.com:25980","root","Lzqzxc,.","dainsai");

//如果有错误，存在错误号
if (mysqli_errno($mysqli)) {

    echo mysqli_error($mysqli);

    exit;
}

mysqli_set_charset($mysqli, 'utf8');   //选择字符集

$arr = getStudentScores($mysqli);

echo json_encode($arr);

//获取所有用户数据

