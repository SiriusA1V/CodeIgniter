<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>사용자 등록</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
           $("#click").click(function () {
               $.ajax({
                  type:"GET",
                   url:"register_into",
                   data:{
                       userid:$("#userid").val(),
                       username:$("#username").val(),
                       userpassword:$("#userpassword").val(),
                       classification:$("#classification").val(),
                       gender:$("#gender").val(),
                       phone:$("#phone").val(),
                       email:$("#email").val()
                   }
               }).done(function(data){
                   if(data.length < 1)
                   {
                       window.location.replace("main");
                   }
                    $("h").remove();
                    $("body").prepend("<h></h>");
                    $("h").prepend(data);
               });
           });
        });
    </script>
</head>
<body>

<!--사용자 입력 -->
<form action="CC.php" method="GET">
    <br>
    <b>사용자 정보 등록</b><br>
    <ol>
        <li>사용자 ID: <input type="text" id="userid"></li>
        <li>이름: <input type="text" id="username"></li>
        <li>암호: <input type="text" id="userpassword"></li>
        <li>구분: <select id="classification">
                    <option value="staff" >교직원</option>
                    <option value="student" selected>학생</option>
                    </select></li>
        <li>성별: <select id="gender">
                    <option value="male">남성</option>
                    <option value="female" selected>여성</option>
                    </select></li>
        <li>전화번호: <input type="text" id="phone"></li>
        <li>이메일: <input type="text" id="email"></li>
    </ol>
    <input type="button" value="등록하기" id="click">
</form>
<button type="button" onclick="javascript:window.location.replace('main')">돌아가기</button>
</body>
</html>