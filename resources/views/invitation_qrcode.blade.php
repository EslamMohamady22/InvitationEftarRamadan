<!DOCTYPE html>
<html>
<head>
    <title>Invetation QrCode</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        .container { text-align: center; }
        h1 { margin-bottom: 1rem; }
        .qr-code { margin-top: 2rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Invetation Qr Code</h1>
        <p>Scan the QR code below:</p>
        <div class="qr-code">
            {!! $qr !!}
        </div>
    </div>
</body>
</html>
