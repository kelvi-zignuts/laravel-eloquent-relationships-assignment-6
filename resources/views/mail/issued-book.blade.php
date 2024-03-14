<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Welcome Email</title>
    <style>
    /* Add custom styling */
    body,
    html {
        height: 100%;
    }

    .container {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow" style="width: 80%; border-radius: 10px;">
            <div class="card-body">
                <p>Hello {{$card->name}} ,</p>
                <div>
                    <p>Your book has been issued:</p>
                    <p><strong>Card ID:</strong> {{$cardId}} </p>
                    <p><strong>Book Name:</strong> {{$book->title}} </p>
                    <p><strong>Is Returned:</strong> {{$isReturned ? 'Yes' : 'No'}} </p>
                    <p><strong>Issue Date:</strong> {{$issuedDate}} </p>
                    <p><strong>Return Date:</strong> {{$returnDate}} </p>
                </div>


                <p>Thank you!</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>