<?php
    $con = mysqli_connect("localhost", "dhzkwkzl2", "skrltkdntldh2!", "dhzkwkzl2","3306");
    $result = mysqli_query($con, "SELECT * FROM NOTICE ORDER BY noticeDate DESC;"); //NOTICE TABLE에서 내림차순으로 생성
    $response = array(); //배열 생성

    while($row = mysqli_fetch_array($result)){
        array_push($response, array("noticeContent"=>$row[0], "noticeName"=>$row[1], "noticeDate"=>$row[2]));
    }

    echo json_encode(array("response"=>$response)); //response 형태로 사용자한테 표시
    mysqli_close($con);
?>