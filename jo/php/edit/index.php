<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원 정보 수정</title>
  <!-- Tailwind CSS CDN 로드 -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* 폰트 설정 */
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

  <!-- 수정 폼 카드 -->
  <div class="bg-white shadow-2xl rounded-2xl p-6 sm:p-10 w-full max-w-md transition-all duration-300 transform hover:shadow-3xl">
    
    <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">
      Coconut edit
    </h1>

    <form action="edit_ok.php" method="post" class="space-y-6">
      
      <!-- 이름 입력 필드 -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">이름</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          placeholder="사용자 이름"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
          required
        >
      </div>

      <!-- 이메일 입력 필드 -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">이메일</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="user@example.com"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
          required
        >
      </div>

      <!-- 비밀번호 입력 필드 -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">비밀번호</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="새 비밀번호 (수정 시 입력)"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
        >
      </div>

      <!-- 수정하기 버튼 -->
      <div>
        <button 
          type="submit" 
          class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold text-lg shadow-md hover:bg-blue-700 transition duration-200 transform hover:scale-[1.01]"
        >
          정보 수정하기
        </button>
      </div>

    </form>
  </div>
</body>
</html>