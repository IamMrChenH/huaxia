<?php
$username = $_REQUEST['username'];
$tel = $_REQUEST['tel'];
$suggestion = $_REQUEST['suggestion'];


include '/conn.php';
$sql = "insert into suggestion(username,tel,suggestion)"
." values('".$username."','".$tel."','".$suggestion."')";
if($conn->query($sql)=== TRUE){
   echo '提交成功！';

//header("Location:/index.php");

}else{
echo '提交失败！';
}
