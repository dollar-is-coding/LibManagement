<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Giao diện Email</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 130%;
            background-color: black;
            display: flex;
            justify-content: center
        }

        .header {
            background-color: blueviolet;
            font-size: 150%;
            color: white;
            font-weight: bold;
            border-start-end-radius: 25px;
            border-start-start-radius: 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 4px 0px;
        }

        .row {
            display: flex;
            background-color: cyan;
            background-size: cover;
            height: 10vw;
            border-end-end-radius: 25px;
            border-end-start-radius: 25px;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            justify-content: space-between;
            font-size: 90%;
            padding: 20px 24px 0px;
        }

        .info {
            display: flex;
        }

        .mainInfo {
            font-weight: 600
        }

        .label {
            font-weight: normal;
            font-style: italic
        }

        .mainContent {
            margin-left: 14px
        }

        .nameCard {
            font-weight: 700;
            padding-bottom: 4px;
            font-size: 110%
        }

        .card {
            width: 28vw;
        }

        .profile {
            width: 6.5vw;
            height: 7.5vw;
            background-color: azure
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="header">L i b r o</div>
        <div class="row">
            <div>
                <div class="nameCard">Nguyễn Văn Đô</div>
                <div class="info">
                    <div>
                        <div class="label">Card no :</div>
                        <div class="label">DoB :</div>
                        <div class="label">Add :</div>
                    </div>
                    <div class="mainContent">
                        <div class="mainInfo">#12345678</div>
                        <div class="mainInfo">12/23/2023</div>
                        <div class="mainInfo">An Giang</div>
                    </div>
                </div>
            </div>
            {{ QrCode::size(100)->generate('code') }}
        </div>
    </div>
</body>

</html>
