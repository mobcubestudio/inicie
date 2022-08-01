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

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Etapa 1 - Criar Usuário</h3>

                    <a href="{{route('inicie.usuarios')}}" target="_blank">Listar Usuários</a><br><br>

                    ID: {{$novoUsuario->id}}<br />
                    NOME: {{$novoUsuario->name}}<br />
                    E-MAIL: {{$novoUsuario->email}}<br />
                    GÊNERO: {{$novoUsuario->gender}}<br />
                    STATUS: {{$novoUsuario->status}}<br />

                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Etapa 2 - Criar Post</h3>

                    <a href="{{route('inicie.posts')}}" target="_blank">Listar Posts</a><br><br>

                    ID: {{$novoPost->id}}<br />
                    ID USUÁRIO: {{$novoPost->user_id}}<br />
                    TÍTULO: {{$novoPost->title}}<br />
                    TEXTO: {{$novoPost->body}}<br />

                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Etapa 3 - Criar Comentário</h3>

                    <a href="{{route('inicie.comentarios')}}" target="_blank">Listar Comentários</a><br><br>

                    ID: {{$novoComentario->id}}<br />
                    ID POST: {{$novoComentario->post_id}}<br />
                    NOME: {{$novoComentario->name}}<br />
                    E-MAIL: {{$novoComentario->email}}<br />
                    TEXTO: {{$novoComentario->body}}<br />

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Etapa 4 - Primeiro Post</h3>

                    <a href="{{route('inicie.posts')}}" target="_blank">Listar Posts</a><br><br>

                    ID: {{$primeiroPost->id}}<br />
                    ID USUÁRIO: {{$primeiroPost->user_id}}<br />
                    TÍTULO: {{$primeiroPost->title}}<br />
                    TEXTO: {{$primeiroPost->body}}<br />

                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Etapa 5 - Primeiro Post (Comentário)</h3>

                    <a href="{{route('inicie.comentarios')}}" target="_blank">Listar Comentários</a><br><br>

                    ID: {{$novoComentarioPrimPost->id}}<br />
                    ID POST: {{$novoComentarioPrimPost->post_id}}<br />
                    NOME: {{$novoComentarioPrimPost->name}}<br />
                    E-MAIL: {{$novoComentarioPrimPost->email}}<br />
                    TEXTO: {{$novoComentarioPrimPost->body}}<br />

                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-danger">Etapa 6 - Excluir comentário</h3>

                    Acesse a lista e exclua o comentário. <br>

                    <a href="{{route('inicie.comentarios')}}" target="_blank">Listar Comentários</a><br><br>


                </div>
            </div>
        </div>
    </div>



</div>
</body>
</html>
