<?php
    $con=mysqli_connect("localhost","root","1234","sqlDB") or die("MySQL 접속실패 !!");

    $userID = $_POST["userID"];
    $name = $_POST["name"];
    $birthYear = $_POST["birthYear"];
    $address = $_POST["address"];
    
    $sql = " INSERT INTO userTbl VALUES('".$userID."','".$name."',".$birthYear.",'".$address."')";
    

    $ret = mysqli_query($con, $sql);

    echo "<h1> 신규 회원 입력 결과</h1>";
    if($ret){
        echo "데이터가 성공적으로 입력됨.";
    }
    else{
        echo "데이터 입력 실패!!!"."<br>";
        echo "실패 원인 :".mysqli_error($con);
    }
    mysqli_close($con);

    echo "<br> <a href= 'main.html'> <--초기화면</a>";
    ?>