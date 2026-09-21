<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email di Benvenuto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <h1>Ciao, {{ $user->name }}</h1>
        <p>Grazie per esserti registrato alla nostra piattaforma. <br>
            Siamo felici di averti qui con noi!!</p>
        <p>Christian sta facendo dei test automatici per l'invio di mail dopo la registrazione alla sua piattarofma.</p>
        <h2>Si prega di non denunciare questo accaduto Grazieeeee!! </h2>
        <p>Comunica via whatsapp al Proprietario se la m mail è arrivata con successo!</p>

    </div>
</body>

</html>