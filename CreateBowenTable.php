<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/6/28
 * Time: 15:04
 */

$servername = "localhost";
$username = "root";
$password = "Abc12345";
$dbname = "YiYou";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Fail to connect: ".$conn->connect_error);
}

$bowen_table_sql = "create table bowen(
bId int(11) unsigned auto_increment primary key,
bUserId int(11) not null,
bUserNickname varchar not null,
bTitle varchar not null ,
bBody message_text not null,
bImage varchar,
bZanNumber int not null,
bCommentId int(11) not null,
bCollectNumber int not 
)";

if ($conn->query($bowen_table_sql) === TRUE) {
    echo "bowen table created successfully";
} else {
    echo "Fail to create bowen table " . $conn->error;
}

$conn->close();