<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0000FF; /* GCash green */
            color: #ffffff; /* White text */
            padding: 20px;
        }
        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
            
        }
        p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #87CEEB; /* White background */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        .gcash-logo {
            display: block;
            margin: 0 auto;
            width: 150px; /* Adjust size as needed */
            height: auto;
            margin-bottom: 30px;
        }
        .gcash-button {
            display: block;
            width: 100%;
            padding: 15px 0;
            background-color: #0000FF; /* GCash green */
            color: #ffffff; /* White text */
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .gcash-button:hover {
            background-color: #87CEEB; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="image/gcash logo.png" alt="GCash Logo" class="gcash-logo">
        <img src="image/qr.png" alt="GCash Logo" class="gcash-logo">

        <h1>Scan Me!</h1>
        <p>This is the GCash payment page. You can provide instructions or any necessary information for completing the payment here.</p>
        <p>Feel free to add any content specific to the GCash payment process.</p>
        <button class="gcash-button">Proceed with GCash Payment</button>
    </div>
</body>
</html>
