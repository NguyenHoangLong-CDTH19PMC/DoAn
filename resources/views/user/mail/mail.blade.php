<!DOCTYPE html>
<html>

<head>

</head>

    <body>
        <h1>{{ $mailData['title'] }}</h1>
        <p>{{ $mailData['body'] }}</p>
        <a href="{{ route('doi-matkhau-user', ['email' => $mailData['email']]) }}">Nhấn
            vào đây để xác nhận email </a>
        <p>Cảm ơn!!!</p>
    </body>

</html>
