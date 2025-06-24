<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pilih Boxes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .box {
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px;
      width: 250px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-align: center;
    }

    .box h3 {
      margin: 0 0 10px;
    }

    .box p {
      font-size: 14px;
      color: #555;
    }

    .vote-btn {
      margin-top: 15px;
      padding: 10px 20px;
      border: none;
      background-color: #007bff;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }

    .vote-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <h1>Pilih `</h1>

  <div class="container">
    <div class="box">
      <h3>contoh 1</h3>
      <p>contoh.</p>
      <button class="vote-btn">Pilih</button>
    </div>
    <div class="box">
      <h3>contoh 2</h3>
      <p>contoh</p>
      <button class="vote-btn">Pilih</button>
    </div>
    <div class="box">
      <h3>contoh 3</h3>
      <p>contoh.</p>
      <button class="vote-btn">Pilih</button>
    </div>
    <div class="box">
      <h3>contoh 4</h3>
      <p>contoh.</p>
      <button class="vote-btn">Pilih</button>
    </div>
  </div>

</body>
</html>
