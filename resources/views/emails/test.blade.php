<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $details['subject'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #4CAF50;
        }

        p {
            line-height: 1.5;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>{{ $details['subject'] }}</h2>
        <p>Dear {{ $details['name'] }},</p>

        <p>Congratulations! Your registration has been successfully completed for our Golden Jubilee celebrations.</p>

        <p>We sincerely appreciate your invaluable contributions and continuous support. Your involvement has helped us reach this remarkable milestone, and we are grateful to have you as part of our journey.</p>

        <p>Let’s celebrate this moment together and continue building brighter memories for the years to come!</p>
        <p>
            Your Alumni ID:
            <span style="
        display: inline-block;
        padding: 8px 12px;
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;
        border: 2px solid #388E3C;
    ">
                {{ $details['alumniId'] }}
            </span>
        </p>

    </div>
</body>

</html>