# developers
Crud de desenvolvedores

[![NPM](https://img.shields.io/npm/l/react)](https://github.com/alexramos1977/developers/blob/main/LICENSE) 

# Sobre o projeto

A aplicação consiste em criar, listar, editar e excluir **registros de desenvolvedores**

## Arquivos principais
web.php
+ Define a rota direcionada à view

api.php
+ Define as rotas da **API**

App/Models/Developer.php
+ Define os campos da tabela **developers**

database/migrations/2021_09_09_223444_create_developers_table.php
+ Cria a tabela **developers**

.env
+ Entre outras coisas, define a base de dados **developer**

App/Http/Controllers/DeveloperController.php
+ Controla toda a regra de negócios da API

resources/views/index.html
+ View principal da aplicação

# Tecnologias Utilizadas

## Back End
+ Mysql
+ PHP
+ Laravel 8
## Front End
+ HTML/CSS/JS
+ Jquery
+ Bootstrap

# Como executar o projeto

## Back End
Pré-requisitos: PHP 7.3 a 8.0

```bash
# clonar repositório
git clone https://github.com/alexramos1977/developers.git

# executar projeto em localhost
http://localhost/developers/public
```
## Front End
Pré-requisitos: Bootstrap 5.1.1 e Jquery 3.6

```bash
# clonar repositório
git clone https://github.com/alexramos1977/developers.git

# executar projeto em localhost
Essa aplicação é uma API, portanto pode ser executada com um simples arquivo HTML
```

# Autor

Alexsandro Alves Ramos

https://www.linkedin.com/in/alexsandro-alves-ramos-11a861211
