<?php
    $con=mysqli_connect("localhost","root","1234","sqlDB") or die("MySQL 접속실패 !!");

    $sql = "SELECT * FROM usertbl";

    $ret = mysqli_query($con,$sql);
    if($ret){
        $count = mysqli_num_rows($ret);
    }
    else{
        echo "userTBL 데이터 조회 실패!!!"."<br>";
        echo "실패 원인:".mysql_error($con);
        exit();
    }

    echo "<h1>회원 조회 결과</h1>";
    echo "<TABLE border=1>";
    echo "<TR>";
    echo "<TH>아이디</TH><TH>이름</TH><TH>출생연도</TH><TH>지역</TH>";
    echo "<TH>수정</TH><TH>삭제</TH>";
    echo "</TR>";
    while($row = mysqli_fetch_array($ret)){
        echo "<TR>";
        echo "<TD>", $row['userID'], "</TD>";
        echo "<TD>", $row['name'], "</TD>";
        echo "<TD>", $row['birthYear'], "</TD>";
        echo "<TD>", $row['address'], "</TD>";
        echo "<TD>", "<a href='update.php?userID=", $row['userID'], "'>수정</a></TD>";
        echo "<TD>", "<a href='delete.php?userID=", $row['userID'], "'>삭제</a></TD>";
        echo "</TR>";
    }

    mysqli_close($con);
    echo "</TABLE>";
    echo "<br> <a href='main.html'> <--초기화면</a> ";
?>