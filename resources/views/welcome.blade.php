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


    @if(isset($retorno))
        <div class="alert alert-{{$retorno['class']}}" role="alert">
            {{$retorno['msg']}}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Criar Usuário</h3>
                    <form action="{{route('inicie.usuario.cadastrar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <input name="name" type="text" class="form-control" placeholder="Nome">
                            </div>
                            <div class="col-3">
                                <input name="email" type="text" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="col-3">
                                <select name="gender" id="gender" required class="form-select">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select name="status" id="status" required class="form-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success mt-3">Criar Usuário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                                <a href="#">
                                    <button class="btn-sm btn-info">+ Post</button>
                                </a>
                                <a href="{{route('inicie.delete',['usuario',$usuario['id']])}}">
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
