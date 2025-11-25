<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
</head>
<body>
    <form action="regist_ok.php" method="post">
    <table border="1" width="600" height="200" style="margin:0 auto; text-align: center;">
        <th>회원 가입</th>
        <tr>
            <td>EMAIL : <input type="text" name = "email" width="400" padding="10px" /></td>
        </tr>
        <tr>
            <td>password : <input type="password" name = "password" width="400" padding="10px" /></td>
        </tr>
        <tr>
            <td>NAME : <input type="text" name = "name" width="400" padding="10px" /></td>
        </tr>
        <tr>
            <td><input type="submit" value="회원 가입"></td>
        </tr>
        <tr>
            <td><a href = "../login">뒤로가기</a></td>
        </tr>
    </table>
    </form>

</body>
</html>