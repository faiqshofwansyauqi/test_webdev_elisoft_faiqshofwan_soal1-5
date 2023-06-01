<!DOCTYPE html>
<html>
<head>
  <title>Avatar Generator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: rgb(255, 255, 255);
      text-align: center;
    }

    h1 {
      color: #1d1c1c;
    }

    .avatar-form {
      max-width: 400px;
      margin: 50px auto;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .avatar-input {
      width: 95%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    .avatar-button {
      display: inline-block;
      width: 48%;
      padding: 10px;
      margin-top: 10px;
      font-size: 16px;
      color: #fff;
      background-color: #218c78;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }

    .avatar-button:first-child {
      margin-right: 4%;
    }

    .avatar {
      max-width: 300px;
      margin-top: 20px;
    }

    .back-button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      color: #fff;
      background-color: #218c78;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      text-decoration: none;
      margin-top: 20px;
    }
  </style>
</head>
<body> 
<h1>Avatar Generator</h1>
    <div class="avatar-form">
      <input type="text" id="text-input" class="avatar-input" placeholder="Masukkan Teks" />
      <button onclick="generateAvatar()" class="avatar-button">Generate</button>
      <a href="javascript:history.back()" class="back-button">Kembali</a>
      <div id="avatar-container"></div>
    </div>
  
    <script>
      function generateAvatar() {
        var text = document.getElementById('text-input').value;
        var imageUrl = 'https://robohash.org/' + encodeURIComponent(text);
        var avatarContainer = document.getElementById('avatar-container');
        avatarContainer.innerHTML = '<img class="avatar" src="' + imageUrl + '" alt="Avatar" />';
      }
    </script>
</body>
</html>
