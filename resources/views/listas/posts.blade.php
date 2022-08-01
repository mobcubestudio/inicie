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
                    <h3>Lista de Posts</h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id Usuário</th>
                            <th scope="col">Título</th>
                            <th scope="col">Texto</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post['id']}}</th>
                            <td>{{$post['user_id']}}</td>
                            <td>{{$post['title']}}</td>
                            <td>{{$post['body']}}</td>
                            <td>
                                <a href="{{route('inicie.posts.delete',['post',$post['id']])}}">
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
