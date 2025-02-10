# Teste tecnico Voch

## Requisitos:

- php 8 ou superior
- mysql 8 ou superior
- composer

## Como rodar o projeto:

- Duplique o arquivo .env.exemple, renomeie para .env, altere no .env as credenciais do banco de dados,

- Inatale as dependecias do PHP 
    ```bash
    composer install
    ```

- Gerar a chave no arquivo .env 
    ```bash
    php atisan key:generate
    ```

- Executar as migrations
    ```bash 
    php artisan migrate
    ```

- Executar as seeds
    ```bash 
    php artisan db:seed
    ```


