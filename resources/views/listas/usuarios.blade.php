<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Inicie</title>
</head>
<body>
<div class="container">
    <h1>INICIE</h1>

    @include('alerta')


    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Lista de Usuários</h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{$usuario['id']}}</th>
                            <td>{{$usuario['name']}}</td>
                            <td>{{$usuario['email']}}</td>
                            <td>{{$usuario['gender']}}</td>
                            <td>{{$usuario['status']}}</td>
                            <td>
                                <a href="{{route('inicie.usuarios.delete',['usuario',$usuario['id']])}}">
                                    <button class="btn-sm btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
