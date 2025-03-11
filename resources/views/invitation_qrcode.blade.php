<!DOCTYPE html>
<html>

<head>
    <title>Invetation QrCode</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }

        .container {
            text-align: center;
        }

        h1 {
            margin-bottom: 1rem;
        }

        .qr-code {
            margin-top: 2rem;
        }

        /* Stylish Button CSS */
        #download-btn {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(145deg, #007bff, #0056b3);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        #download-btn:hover {
            background: linear-gradient(145deg, #0056b3, #007bff);
            transform: translateY(-2px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        #download-btn:focus {
            outline: none;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</head>

<body>
    <div class="container">
        <div style="width: 250px; margin:auto;" id="qrcode">
            <div style="padding: 1rem  0 0.5rem 0 ; border:2px dashed #111 ;  " >
                <img width="200" alt="dania Logo" src="{{ asset('daniaAirLogo.png') }}" />
                <h1>Your Invitation </h1>
                <h2>{{ $invetationCode }}</h2>
                <div class="qr-code">
                    {!! $qr !!}
                </div>
                <h3>{{ __('Company') }} : {{ $data->company }}</h3>
                <h3>{{ __('Guests') }} : {{ $data->guest_count + 1 }}</h3>
            </div>
        </div>
        <button id="download-btn">Download Invetation</button>
    </div>
</body>

<script>
    document.getElementById('download-btn').addEventListener('click', function() {
        // Use html2canvas to take a snapshot of the QR code element
        html2canvas(document.getElementById('qrcode')).then(function(canvas) {
            // Convert the canvas to a data URL in PNG format
            const image = canvas.toDataURL("image/png");

            // Create a temporary link element
            const link = document.createElement('a');
            link.href = image;
            link.download = 'qrcode.png';

            // Programmatically click the link to trigger the download
            link.click();
        });
    });
</script>

</html>
