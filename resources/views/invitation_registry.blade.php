<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invitation Form</title>
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            
            background-image: url("{{ asset('/eftar2.jpg') }}");
            background-repeat: no-repeat;
            background-position: middle center;
            background-size: cover;
            /* Adjust as needed */
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Invitation Container */
        .invitation-container {
            /* background: #fff; */
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(1px);
            -webkit-backdrop-filter: blur(1px);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin-top: 150px;
        }

        .invitation-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form Styles */
        .invitation-form .form-group {
            margin-bottom: 20px;
        }

        .invitation-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .invitation-form input[type="text"],
        .invitation-form input[type="email"],
        .invitation-form input[type="number"],
        .invitation-form input[type="tel"],
        .invitation-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .invitation-form textarea {
            resize: vertical;
            height: 100px;
        }

        .invitation-form button {
            width: 100%;
            padding: 12px;
            background: #ff6f61;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .invitation-form button:hover {
            background: #ff3b2f;
        }
    </style>
</head>

<body>



    <div class="invitation-container">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
            <br>
        @endforeach
    @endif
    <div style="margin:auto;width:250px"><img  style="width:250px;height:auto; " alt="dania Logo" src="{{ asset('logo.png') }}" /></div>

        <h1>You're Invited!</h1>
        <form action="{{route('invitation.store')}}" method="post" class="invitation-form">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="email">Position</label>
                <input type="text" id="position" name="position" placeholder="Enter your Position">
            </div>
            <div class="form-group">
                <label for="guests">Guests</label>
                <input type="number" id="guests" name="guest_count" min="1"

                 placeholder="Number of guests without You">
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company" placeholder="Enter your company name">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
