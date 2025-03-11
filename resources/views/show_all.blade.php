<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invitation Data</title>
    <style>
        /* Global Styles */
        body {
            background: #f2f2f2;
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .table-container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead tr {
            background: #ff6f61;
            color: #fff;
            text-align: left;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:nth-child(even) {
            background: #f9f9f9;
        }
        tbody tr:hover {
            background: #f1f1f1;
        }
        @media (max-width: 600px) {
            th, td {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h1>Invitation Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Guests</th>
                    <th>Company</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @php $totalGuests = 0;  @endphp
                @foreach($invitations as $invitation)
                @php $guestsCount = $invitation->guest_count + 1; @endphp
                    <tr>
                        <td>{{ $invitation->name }}</td>
                        <td>{{ $invitation->email }}</td>
                        <td>{{ $invitation->position }}</td>
                        <td>{{ $guestsCount }}</td>
                        <td>{{ $invitation->company }}</td>
                        <td>{{ $invitation->phone }}</td>
                    </tr>
                    @php $totalGuests += $guestsCount; @endphp
                @endforeach
                <!-- If no data exists, you could display a message -->
                @if($invitations->isEmpty())
                    <tr>
                        <td colspan="7" style="text-align:center;">No invitation data available.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr> 
                    <td colspan="5" >{{__('Total Guests ')}}  </td>
                    <td>{{$totalGuests}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
