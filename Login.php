<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/27
 * Time: 15:13
 */

require_once ('Connect.php');

$tel = $_POST['tel'];
$password = $_POST['password'];

$sql_login = "select * from user where uTelephone = '$tel'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if($password == $row['uPassword']){
        $data = array(
            "nickname"=>$row['uNickname'],
            "telephone"=>$row['uTelephone'],
            "sex"=>$row['uSex'],
            "headphoto"=>$row['uHeadPhoto'],
            "introduce"=>$row['uIntroduce'],
            "isguide"=>$row['uIsGuide'],
            "guideid"=>$row['uGuideId'],
            "collectguideid"=>$row['uCollectGuideId'],
            "collecteassyid"=>$row['uCollectEssayId'],
            "star"=>$row['uStars'],
            "password"=>$row['uPassword']
        );
        Response::json(1,"登录成功",$data);
    }else{
        Response::json(0,"密码错误","");
    }
}
$conn->close();





