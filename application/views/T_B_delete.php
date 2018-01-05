<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>사용자 등록</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        
    </script>
</head>
<body>

<!--사용자 입력 -->
<form action="delete_into" method="GET">                <!--딜리트 실패시 입력한 정보 그대로-->
    1. 사용자 ID: <input type="text" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : null ?>"><br>
    2. 암호: <input type="text" name="pswd" value="<?php echo isset($_GET['pswd']) ? $_GET['pswd'] : null ?>"><br>
    3. <input type="submit" value="삭제하기">
    <input type="hidden" name="add" value="delete_m">
    <button type="button" onclick="javascript:window.location.replace('main')">돌아가기</button>
</form>
</body>
</html>