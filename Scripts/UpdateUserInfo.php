<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/28
 * Time: 17:17
 */

require_once('Connect.php');

$tel = str_replace('"','', $_POST['tel']);
$password = str_replace('"','', $_POST['password']);
$nickname = str_replace('"','', $_POST['nickname']);
$sex = str_replace('"','', $_POST['sex']);
$introduce = str_replace('"','', $_POST['introduce']);
$isUpdateHeadIcon = str_replace('"','', $_POST['imageInfo']);

if($isUpdateHeadIcon == "update"){
    if($_FILES["file"]["error"]>0){
        Response::json(0,urlencode("Image file error：". $_FILES["file"]["error"]),"");
    }else{
        $newfile= time().rand(1,1000).substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],"."));
        $imagepath= "http://118.89.18.136/YiYou/image/".$newfile;
        if(move_uploaded_file($_FILES["file"]["tmp_name"], "image/".$newfile)){
            $sql_update = "update user set 
                           uNickname = '$nickname',
                           uSex = '$sex',
                           uHeadPhoto = '$imagepath',
                           uIntroduce = '$introduce',
                           uPassword = '$password'
                           where uTelephone = '$tel'";
            if ($conn->query($sql_update) === TRUE) {
                Response::json(1,"Update success","");
            } else {
                Response::json(0,"Update fail 1, server error: ".$conn->error,"");
            }
        }else{
            Response::json(0,"Image file move error","");
        }
    }
}else{
    $sql_update = "update user set 
                   uNickname = '$nickname',
                   uSex = '$sex',
                   uIntroduce = '$introduce',
                   uPassword = '$password'
                   where uTelephone = '$tel'";
    if ($conn->query($sql_update) === TRUE) {
        Response::json(1,"Update success","");
    } else {
        Response::json(0,"Update fail 2, server error: ".$conn->error,"");
    }
}
$conn->close();