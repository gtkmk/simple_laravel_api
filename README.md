<h1 align="center">API em Laravel</h1>
<br>

## Descrição do Projeto

<p align="center">Este projeto é destinado a calcular a área de figuras geométricas, como triângulos e retângulos, através de uma API construída com Laravel.</p>
<br>

## Comandos importantes

<br>
Para utilizar este projeto, siga os passos abaixo:
<br>
Com o **Docker Desktop rodando**, vá até a pasta raiz do projeto e execute os seguintes comandos em ordem:

***docker-compose build***

***docker-compose up -d***

***docker-compose exec app php artisan key:generate***

Verifique se os três serviços estão rodando e, em seguida, rode as migrations com o seguinte comando:

***php artisan migrate***

Para iniciar o servidor local, utilize o comando:

***php artisan serve***

Para rodar os testes unitários, utilize o comando:

***php artisan test***
<br>
<br>
## Rotas e utilização da API
<br>
Utilize as seguintes rotas:
<br>
POST http://127.0.0.1:8000/api/triangles
<br>
POST http://127.0.0.1:8000/api/rectangles
<br>
Nos métodos PIST é necessário enviar as informações de base e altura no corpo da requisição no formato JSON.
<br>
Exemplo de corpo da requisição:
<br>
<br>
{
    "base": "10",
    "height": "15"
}

<br>
GET **http://127.0.0.1:8000/api/areasum**
<br>
Retorna a soma das áreas de todas as figuras geométricas cadastradas no banco de dados.
<br>
<br>
## Como rodar códigos SQL e visualizar o BD
<br>
Para acessar o banco de dados, siga os passos abaixo:
<br>
Na pasta raiz do projeto, execute o comando:

***docker ps***

Localize a imagem de nome "mysql:5.7" e copie o CONTAINER ID.

Execute o comando abaixo, substituindo o ID_do_Contêiner_MySQL pelo ID do contêiner:

***docker exec -it <ID_do_Contêiner_MySQL> bash***

Em seguida, para acessar o MySQL, execute o comando:

***mysql -u laravel -psecret***
<br>
Você já pode rodar comandos SQL no banco de dados.
<br>
***Comandos mais usados:
SHOW DATABASES;
USE laravel;
SHOW tables;
SELECT * FROM triangles;
SELECT * FROM rectangles;***
