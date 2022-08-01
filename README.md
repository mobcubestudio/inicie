# INICIE

Segue nesse documento, uma visão geral dos métodos e técnicas utilizados nessa avaliação.

Essa avaliação foi desenvlvida em Laravel 9/PHP 8.1.8

## Controllers

- usuarioController
- postController
- comentarioController

## Variáveis de Sessão
Como o foco do teste não é Front-end, criei uma tela para cada etapa, ao invés de usar **@yield()** e **@content()**. Para fins de visualização em telas posteriores, optei por passar algumas variáveis por **Session::put()**.

## Retornos de erros
Tratei retorno de erros de 2 fromas, também a fim de demonstrar possibilidades.
- **abort(codigo)**
  - retorna a uma página específica com o erro, de acordo com o código. Ex.: 404, 500, etc.
- **array('satus')**
  - Um array contendo o status **sucesso|erro** entre outras informações, podendo assim, tratar esse retorno de acordo com o código de erro retornado. 

# Features Extras
## Custom Facade (Geral)
### App\Classes\Geral

Essa facade é responsável por situações globais e rotineiras no sistema, tais como obter **tokens** e **urls** da api.

Em relação aos métodos de ações, propositalmente, optei somente pela criação do método **delete()** nessa facade, a fim de demonstrar funcionalidades com essa técnica, uma vez que nesse caso é necessário somente informar o id. 
Outros métodos, optei por deixar diretamente em suas respectivas controllers, também a fim de demonstrar possibilidades. 

# UTILIZAÇÃO
## Docker compose
arquivo de configuração: ./docker-compose.yml

$ cd PASTA_DO_PROJETO

$ ./vendor/bin/sail up -d

## Acesso
http://localhost:8000 (Alterar ${APP_PORT} na linha 5 de .env, caso queira utilizar outra porta)

Abra a url, em seguida clicar no botão de ação de cada etapa.
