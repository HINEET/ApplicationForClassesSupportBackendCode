<?php
$con = mysqli_connect("localhost", "dhzkwkzl2", "skrltkdntldh2!", "dhzkwkzl2");

$userID = $_POST["userID"]; //아이디 비번 매개변수로 받음
$userPassword = $_POST["userPassword"];

$statement = mysqli_prepare($con, "SELECT * FROM USER WHERE userID = ?");
//해당 사용자가 존재하는지 USER TABLE에서 확인한다.
mysqli_stmt_bind_param($statement, "s", $userID); //id, password 둘다 string이기에 ss 넣어서 사용
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $checkedPassword, $userGender, $userMajor, $userEmail);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
    if(password_verify($userPassword, $checkedPassword))
    {
        $response["success"] = true;
        $response["userID"] = $userID; //해당 id가 있으면 success를 true로 변환
    }
}

echo json_encode($response);
?>