# Avaliação para oportunidade de desenvolvimento backend em PHP
Este projeto tem como objetivo a construção de uma API para o gerenciamento de bikes com as opções de exibição, criação, edição, exclusão e listagem de bicicletas. Além disso, teremos a funcionalidade que permite editar apenas a descrição de uma bike. Utilizamos o framework PHP Laravel para o desenvolvimento devido a facilidade na manipulação de dados e integração com Mysql e uso de migrations com o EloquentORM, na criação de rotas e por já ter contato com o framework em projetos anteriores. O projeto está hospedado no Google Cloud Platform em uma instância Ubuntu 20.04 e pode ser acessado neste [link](http://evertonsantos.tech). Para tornar esta aplicação um microservice faltaria definir metódos de autenticação/autorização, utilizar docker e automatizar o processo de deploy.

## Pré-requisitos
- Composer
- PHP  ^7.3
    - BCMath PHP Extension
    - Ctype PHP Extension
    - Fileinfo PHP Extension
    - JSON PHP Extension
    - Mbstring PHP Extension
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
- MySQL ^5.6

## Como Executar
1. Criar um schema chamado **esales**
2. No diretório do projeto, executar o comando abaixo para instalar as dependências
```
composer install
```
3. Executar as migrations
```
php artisan migrate
```
4. Executar a aplicação
```
php artisan serve
```

## Endpoints

### Listar as Bikes
Endpoint responsável pela exibição das bikes.

```http
GET /api/bikes
```

##### Parâmetros
None.

##### Body
None.

##### Status Code

| Status | Descrição |
|---|---|
|200| Busca concluída com sucesso |

##### Response

```
[
  {
    "id": 1,
    "description": "Bike 1",
    "model": "Modelo 1",
    "amount": "1905.88",
    "purchased_in": "2019-10-25",
    "buyer_name": "Comprador 1",
    "store_name": "Nome da Loja"
  },
  {
    "id": 2,
    "description": "Bike 2",
    "model": "Modelo 1",
    "amount": "1905.88",
    "purchased_in": "2019-10-25",
    "buyer_name": "Comprador 2",
    "store_name": "Nome da Loja"
  }
]
```

### Criar uma Bike
Endpoint responsável pela criação de uma bike.

```http
POST /api/bikes
```

##### Parâmetros
None.

##### Body
```
{
    "description": "Quadro Alumínio, Suspensão com 40mm de curso, Aro 700",
    "model": "700 2021",
    "amount": "1905.88",
    "purchased_in": "2020-10-25",
    "buyer_name": "Maria de Souza Cruz",
    "store_name": "Bike Center"
}
```

##### Status Code

| Status | Descrição |
|---|---|
|201| Registro Criado com Sucesso |

##### Response

```
{
    "id": 1,
    "description": "Quadro Alumínio, Suspensão com 40mm de curso, Aro 700",
    "model": "700 2021",
    "amount": "1905.88",
    "purchased_in": "2020-10-25",
    "buyer_name": "Maria de Souza Cruz",
    "store_name": "Bike Center"
}
```

### Editar uma Bike
Endpoint responsável pela edição de uma bike.

```http
PUT /api/bikes/{bike-id}
```

##### Parâmetros
| Param | Descrição |
|---|---|
|bike-id| ID da Bike |

##### Body
```
{
    "description": "Quadro Alumínio, Suspensão com 40mm de curso, Aro 700",
    "model": "700 2021",
    "amount": "1905.88",
    "purchased_in": "2020-10-25",
    "buyer_name": "Maria de Souza Cruz",
    "store_name": "Bike Center"
}
```

##### Status Code

| Status | Descrição |
|---|---|
|200| Registro Atualizado com Sucesso|
|404| Registro Não Encontrado|

##### Response

```
{
    "id": 1,
    "description": "Quadro Alumínio, Suspensão com 40mm de curso, Aro 700",
    "model": "700 2021",
    "amount": "1905.88",
    "purchased_in": "2020-10-25",
    "buyer_name": "Maria de Souza Cruz",
    "store_name": "Bike Center"
}
```

### Excluir uma Bike
Endpoint responsável pela exclusão de uma bike.

```http
DELETE /api/bikes/{bike-id}
```

##### Parâmetros
| Param | Descrição |
|---|---|
|bike-id| ID da Bike |

##### Body
None.

##### Status Code

| Status | Descrição |
|---|---|
|200| Registro Deletado com Sucesso|
|404| Registro Não Encontrado|

##### Response
None.

### Editar a descrição de uma Bike
Endpoint responsável pela edição da descrição de uma bike.

```http
PATCH /api/bikes/{bike-id}
```

##### Parâmetros
| Param | Descrição |
|---|---|
|bike-id| ID da Bike |

##### Body
```
{
    "description": "Quadro Alumínio, Suspensão com 40mm de curso, Aro 700",
}
```

##### Status Code

|Status|Descrição|
|---|---|
|201|Registro Atualizado com Sucesso|
|404|Registro Não Encontrado|

##### Response

```
{
    "id": 1,
    "description": "Quadro Alumínio, Suspensão com 40mm de curso, Aro 700",
    "model": "700 2021",
    "amount": "1905.88",
    "purchased_in": "2020-10-25",
    "buyer_name": "Maria de Souza Cruz",
    "store_name": "Bike Center"
}
```

## Como rodar os testes

1. Criar um schema chamado **testdb**
2. No diretório do projeto, executar o comando abaixo
```
php artisan test
```
