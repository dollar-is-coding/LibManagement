<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Giao diện Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f6f6f6;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .n_header {
            max-width: 600px;
            height: 100px;
            margin: 0 auto;
            padding: 20px;
            background-color: #5B47FB;
        }

        .logo {
            font-weight: 700;
            font-size: 40px;
            font-family: 'Poppins', sans-serif;
            text-transform: lowercase;
            color: white;
            letter-spacing: -1px;
            display: flex;
            align-items: center;
            position: relative;
            top: -2px;
        }
    </style>
</head>

<body>
    <div class="n_header">
        <h1 class="logo">Libro</h1>
    </div>
    <div class="container">
        <div class="header">
            <h1>Xác minh email</h1>
            <p>Xin chào! Đây là mã xác minh của bạn</p>
            <h2>{{$verify}}</h2>
            <i>{{$body}}</i>
        </div>
    </div>
</body>

</html>