# test.php
GET localhost/people
GET localhost/people/{id}
POST localhost/people
PUT localhost/people/{id}
DELETE localhost/people/{id}
onde {id} é o ID do registro

o contrato de dados para inserir/atualizar um registro é:
{
  "name": "Nome da pessoa",
  "last_name": "Sobrenome da pessoa",
  "birth_date": "data de niver",
  "birth_place": "onde nasceu",
  "hobby": "hobby da pessoa"
}
