<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Utente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Registrazione Utente</h1>
        <!-- Se la sessione è stata creata con successo inserisce il messaggio di successo-->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Se sono presenti degli errori allora lista errori -->
        @if ( $errors->any() )
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('registerUser') }}" method="post">
            <!-- La direttiva Cross-Site Request Forgery protegge i form da attacchi che utilizzano la sessione aperta
             dell'utente per mandare richieste di modifica (Come modifica mail ecc.)  -->
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" require>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" require>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" require>
            </div>

            <!-- Per la conferma automatica della validazione dobbiamo utilizzare lo stesso nome e poi _confirmation, così
             che laravel sappia di suo cohe i due campi solo collegati -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" require>
            </div>

            <button type="submit" class="btn btn-primary">Registrati</button>

        </form>

    </div>
</body>

</html>