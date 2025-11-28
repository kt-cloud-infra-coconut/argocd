<!DOCTYPE html>
<html lang="ko">
<head>
    <title>CoConut 로그인</title>
    <style>
        /* CSS는 회원가입 페이지와 동일하게 적용합니다. */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
        }

        h2 {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
            font-size: 20px;
        }

        /* 입력 필드 그룹 스타일 */
        div {
            margin-bottom: 20px;
        }
        
        /* 입력 상자 스타일 */
        .inputbox-styled {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .inputbox-styled:focus {
            border-color: #007bff;
            outline: none;
        }
        
        /* 레이블 스타일 */
        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: #444;
        }

        /* 로그인 버튼 스타일 */
        #submitbutton {
            background-color: #28a745; /* 녹색 계열 버튼 */
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        #submitbutton:hover {
            background-color: #1e7e34;
        }

        /* 가입/링크 스타일 */
        .link-group {
            text-align: center;
            margin-top: 20px;
        }
        
        .link-group a {
            color: #007bff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s;
        }
        
        .link-group a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CoConut</h1>
        <form action="./login_ok.php" method="post">
            <div>
                <h2>로그인</h2>
                
                <label for="email-input">EMAIL</label>
                <input type="text" name="email" id="email-input" class="inputbox-styled" required />
                
                <label for="password-input">Password</label>
                <input type="password" name="password" id="password-input" class="inputbox-styled" required />
                
                <input type="submit" value="로그인" id="submitbutton" />
                
                <div class="link-group">
                    <a href="../regist">회원가입</a> |
                    <a href="#">비밀번호 찾기</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>