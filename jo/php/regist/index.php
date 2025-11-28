<!DOCTYPE html>
<html lang="ko">
<head>
    <title>CoConut 회원 가입</title>
    <style>
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

        div {
            margin-bottom: 20px;
        }
        
        #inputbox {
            width: 100%; 
            padding: 12px 15px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box; 
            transition: border-color 0.3s;
        }

        #inputbox:focus {
            border-color: #007bff; 
            outline: none; 
        }
        
        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: #444;
        }

        #submitbutton {
            background-color: #007bff; 
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
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .back-link:hover {
            color: #007bff;
        }
        .inputbox-styled {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CoConut</h1>
        <form action="regist_ok.php" method="post">
            <div>
                <h2>회원 가입</h2>
                
                <label for="email-input">EMAIL</label>
                <input type="text" name="email" id="email-input" class="inputbox-styled" />
                
                <label for="password-input">Password</label>
                <input type="password" name="password" id="password-input" class="inputbox-styled" />
                
                <label for="name-input">NAME</label>
                <input type="text" name="name" id="name-input" class="inputbox-styled" />
                
                <input type="submit" value="회원 가입" id="submitbutton" />
                <a href="../login" class="back-link">뒤로가기</a>
            </div>
        </form>
    </div>
</body>
</html>