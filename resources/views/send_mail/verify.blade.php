<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input required type="text" class="verify" name="verify" />
        <button type="submit">Verify</button>
    </form>
    @if (session('error'))
    <div class="text-center text-danger fst-italic" style="margin-top: 10px;">{{ session('error') }}</div>
    @endif
</body>

</html>