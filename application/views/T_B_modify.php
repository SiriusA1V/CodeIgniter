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
                   url:"register_into?modify=1",
                   data:{
                       searchid:$("#searchid").val(),
                       userid:$("#userid").val(),
                       username:$("#username").val(),
                       userpassword:$("#userpassword").val(),
                       classification:$("#classification").val(),
                       gender:$("#gender").val(),
                       phone:$("#phone").val(),
                       email:$("#email").val()
                   }
               }).done(function(data){
                   if(data.length > 1)
                   {
                       alert("아래 항목은 필수 항목 입니다.");
                       window.location.replace("modify");
                   }else{
                       alert("수정완료");
                       window.location.replace("main");
                   }
               });
           });
        });
    </script>
</head>
<body>
<b>수정할 ID를 입력하세요</b><br>
<form action="modify_search" method="GET">
    ID: <input type="text" name="searchid" id="searchid" value="<?php echo isset($user) ? $user[0]->userid : null ?>">
    <input type="submit" value="사용자 정보 조회">
</form>
<!--사용자 입력 -->
<form action="#" method="GET">
    <ol>
        <li>사용자 ID: <input type="text" id="userid" value="<?php echo isset($user) ? $user[0]->userid : null ?>"></li>
        <li>이름: <input type="text" id="username" value="<?php echo isset($user) ? $user[0]->name : null ?>"></li>
        <li>암호: <input type="text" id="userpassword" value="<?php echo isset($user) ? $user[0]->password : null ?>"></li>
        <li>구분: <select id="classification">
                    <option value="staff"
                        <?php if(isset($user) && $user[0]->classification == "staff") {echo "selected";} ?> >
                        교직원</option>
                    <option value="student"
                        <?php if(isset($user)  && $user[0]->classification == "student"){echo "selected";} ?> >
                        학생</option>
                    </select></li>
        <li>성별: <select id="gender">
                    <option value="male"
                        <?php if(isset($user)  && $user[0]->gender == "male"){echo "selected";} ?>>
                        남성</option>
                    <option value="female"
                        <?php if(isset($user)  && $user[0]->gender == "female"){echo "selected";} ?>>
                        여성</option>
                    </select></li>
        <li>전화번호: <input type="text" id="phone" value="<?php echo isset($user) ? $user[0]->phone : null ?>"></li>
        <li>이메일: <input type="text" id="email" value="<?php echo isset($user) ? $user[0]->email : null ?>"></li>
    </ol>
    <input type="button" value="수정하기" id="click">
    <button type="button" onclick="javascript:window.location.replace('main')">돌아가기</button>
</form>
</body>
</html>