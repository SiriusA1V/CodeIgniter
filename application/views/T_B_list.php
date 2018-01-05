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
<table border="1">
    <tr><td>id</td><td>닉네임</td><td>직업</td><td>이름</td><td>성별</td><td>비밀번호</td><td>휴대폰</td><td>이메일</td></tr>
    <?php foreach($user as $i): ?>
        <tr>
            <td><?php echo $i['sysid']?></td>
            <td><?php echo $i['userid']?></td>
            <td><?php echo $i['classification']?></td>
            <td><?php echo $i['name']?></td>
            <td><?php echo $i['gender']?></td>
            <td><?php echo $i['password']?></td>
            <td><?php echo $i['phone']?></td>
            <td><?php echo $i['email']?></td>
        </tr>
    <?php endforeach ?>
</table>
<?php
    echo "<a href='b_list?add=list&page={$page[0]}'><</a>";
    for($i = 2; $i < sizeof($page); $i++){
        echo " <a href='b_list?add=list&page={$page[$i]}'>$page[$i]</a>";
    }
    echo " <a href='b_list?add=list&page={$page[1]}'>></a>";
?>

<button type="button" onclick="javascript:window.location.replace('main')">돌아가기</button>
</body>
</html>