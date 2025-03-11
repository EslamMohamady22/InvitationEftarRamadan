<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invitation Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background: #f2f2f2; */
            /* background-image: url("{{ asset('/eftar_ramadan.webp') }}"); */
            background-image: url("{{ asset('/eftar.jpg') }}");

            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* .invitation-container {

                background: #fff;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
            } */
        .invitation-container {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(1px);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .invitation-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .invitation-details p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.4;
        }

        .invitation-details strong {
            display: inline-block;
            width: 160px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="invitation-container">
        <div class="invitation-details">
            <div style="margin:auto;width:250px"><img  style="width:250px;height:auto; " alt="dania Logo" src="{{ asset('logo.png') }}" /></div>
            <h1>Invitation Details</h1>
            <p><strong>Name:</strong> {{ $invitation->name }}</p>
            <p><strong>Email:</strong> {{ $invitation->email }}</p>
            <p><strong>Position:</strong> {{ $invitation->position }}</p>
            <p><strong>Guests:</strong> {{ $invitation->guest_count }}</p>
            <p><strong>Company:</strong> {{ $invitation->company }}</p>
            <p><strong>Phone:</strong> {{ $invitation->phone }}</p>
        </div>
    </div>
</body>

</html>
