# Agenda de clientes

Para instalar o projeto faça um clone deste repositório

```
    $ git clone https://github.com/bonfanteandre/agenda-private-code.git
```

Acessa o diretório onde o repositório foi clonado

```
    $ cd agenda-private-code
```

Execute o composer para instalar as dependências do projeto

```
 $ composer install
```

Agora você precisará: 

- Criar um banco de dados
- Configurar o banco de dados no arquivo .env do projeto (arquivo .env padrão do Laravel)
- Para configurar o nome do banco de dados, altere o parâmetro "DB_DATABASE"
- Lembre de configurar seu suário e senha do banco de dados também

Agora execute as migrations do Laravel para a estrutura do banco de dados ser criada

```
    $ php artisan migrate
```

Agora você precisa gerar a chave da aplicação

```
    $ php artisan key:generate
```

Por fim, inicie o servidor HTTP com o comando:

```
    $ php artisan serve
```

O usuário padrão do sistema é "administrador@agenda.com.br" e a senha "123456789"
