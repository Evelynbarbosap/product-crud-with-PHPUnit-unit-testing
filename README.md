Desafio  (com Teste Unitário e Paginação) - Implementando CRUD em API RESTful com PHP

Implemente as operações básicas de CRUD (Create, Read, Update e Delete) para gerenciar informações de produtos utilizando uma API RESTful com PHP. Para isso, você pode usar um banco de dados MySQL.

Requisitos:

A API deve ser implementada em PHP e seguir o padrão RESTful.
O banco de dados deve ter uma tabela "produtos" com os campos "id", "nome", "descricao", "preco" e "quantidade".
As operações de CRUD devem ser implementadas para gerenciar os dados da tabela "produtos".
Os dados devem ser retornados em formato JSON.
É necessário implementar testes unitários para garantir a qualidade do código.
O retorno do cadastro deve ser paginado.

Etapas sugeridas:

Implemente a operação de "leitura" para listar todos os produtos.
Implemente a operação de "criação" para adicionar um novo produto.
Implemente a operação de "leitura" para buscar um produto pelo seu ID.
Implemente a operação de "atualização" para atualizar os dados de um produto existente.
Implemente a operação de "exclusão" para remover um produto existente.
Crie testes unitários para validar as operações de CRUD.
Implemente a paginação no retorno da operação de "leitura".

Observações:

Lembrar de criar validações

Teste cada operação individualmente utilizando o Postman ou ferramenta similar.
O código deve ser organizado, de fácil leitura e com comentários.
O uso do framework PHP Slim pode ser uma boa alternativa para implementar uma API RESTful.
Os testes unitários devem ser implementados utilizando PHPUnit.

Exemplo de retorno de um cadastro paginado:
{
    "pagina_atual": 1,
    "total_paginas": 5,
    "total_registros": 25,
    "registros_por_pagina": 5,
    "registros": [
        {
            "id": 1,
            "nome": "Produto 1",
            "descricao": "Descrição do produto 1",
            "preco": 10.99,
            "quantidade": 100
        },
        {
            "id": 2,
            "nome": "Produto 2",
            "descricao": "Descrição do produto 2",
            "preco": 20.99,
            "quantidade": 200
        }


Postman:
List
![image](https://github.com/Evelynbarbosap/product-crud-with-PHPUnit-unit-testing/assets/38754479/d1c8662f-d88e-43fc-8936-a549d9e7a961)
Post
![image](https://github.com/Evelynbarbosap/product-crud-with-PHPUnit-unit-testing/assets/38754479/229eca42-33b2-4e3f-94d7-bb67402747d3)
Show
![image](https://github.com/Evelynbarbosap/product-crud-with-PHPUnit-unit-testing/assets/38754479/dd524423-e5e3-4307-8a3a-0ab2b1295f73)
Update
![image](https://github.com/Evelynbarbosap/product-crud-with-PHPUnit-unit-testing/assets/38754479/bccce6b2-436b-48ed-8b93-0fa79c45204f)
Delete
![image](https://github.com/Evelynbarbosap/product-crud-with-PHPUnit-unit-testing/assets/38754479/0e835e3b-4673-47d8-b875-5a20f27d9a09)

Utilizei o pgamdin para o postgresql.
PhpUnit para os testes unitários.
Laravel 10 para o desenvolvimento do desafio. 




