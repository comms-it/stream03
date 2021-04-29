

<head>
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3/dist/css/bootstrap.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="bootstrap-5.0.0-beta3/dist/js/bootstrap.js"></script>
    <title>Test Streaming</title>
</head>

<body style="background-color: rgb(209, 241, 241);">
    <div class="container p-5">
        <div class="card border rounded-lg shadow-lg mx-auto" style="width: 329px;">
            <div class="card-head shadow border rounded-lg" style="background-color: #0dcaf0;">
                <h1 class="py-1 text-center text-uppercase ">Data</h1>
            </div>
            <div class="card-body">
                <h1><span class="text-muted">Name:</span><?= $_GET['inName'] ?></h1>
                <h1><span class="text-muted">Surname:</span><?= $_GET['inSurname'] ?></h1>
                <h1><span class="text-muted">Age:</span><?= $_GET['inAge'] ?></h1>
            </div>
        </div>
    </div>
</body>