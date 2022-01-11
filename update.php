<?php
    $con=mysqli_connect("localhost","root","1234","sqlDB") or die("MySQL 접속실패 !!");
    $sql = "SELECT * FROM userTbl WHERE userID='".$_GET['userID']."'";

    $ret = mysqli_query($con, $sql);
    if($ret){
        $count = mysqli_num_rows($ret);
        if($count ==0) {
            echo $_GET['userID']." 아이디의 회원이 없음!!!"."<br>";
            echo "<br> <a href='main.html'> <--초기화면 </a>";
            exit();
        }
    }
    else{
        echo "데이터 조회 실패!!!"."<br>";
        echo "실패 원인:".mysqli_error($con);
        echo "<br> <a href='main.html'> <--초기화면 </a>";
        exit();
    }
    $row = mysqli_fetch_array($ret);
    $userID = $row['userID'];
    $name = $row["name"];
    $birthYear = $row["birthYear"];
    $address = $row["address"];
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>회원 정보 수정</h1>
<FORM METHOD="post" ACTION="update_result.php">
    아이디 : <input type="text" name = "userID" VALUE=<?php echo $userID ?>(바꾸지마세요)> <br>
    이름 : <input type="text" name = "name" VALUE=<?php echo $name ?>> <br>
    출생년도 : <input type="text" name = "birthYear" VALUE=<?php echo $birthYear ?>> <br>
    지역 : <input type="text" name = "address" VALUE=<?php echo $address ?>> <br>
    <BR><BR>
    <input type="submit" VALUE="정보수정">
</FORM>
    
</body>
</html>