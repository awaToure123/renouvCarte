<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }
        .form-floating {
            margin-bottom: 15px;
        }
        .form-floating input {
            height: 50px;
            padding: 10px;
            font-size: 16px;
        }
        .form-floating label {
            font-size: 14px;
            color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 50px;
            padding: 15px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

<form action="{{route('reset.password.users.account')}}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="text" class="form-control bg-white border-0" name="emailOrTel" id="name" placeholder="Email ou Téléphone">
                <label for="name">Identifiant</label>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="password" class="form-control bg-white border-0" id="password" name="password" placeholder="Mot de passe">
                <label for="password">Mot de passe</label>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Mot de passe confirmation">
                <label for="password_confirm">Mot de passe confirmation</label>
            </div>
        </div>
       
        <div class="col-12 mt-3">
            <button class="btn btn-primary text-white w-100 py-3" type="submit">Soumettre</button>
        </div>
    </div>
</form>

</body>
</html>
