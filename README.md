# Teste tecnico Voch

## Requisitos:

- php 8 ou superior
- mysql 8 ou superior
- composer

## Como rodar o projeto:

- clone o projeto:

    ```bash
    git clone https://github.com/Alisonais/teste-voch.git
    ```

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
    php artisan migrate --seed
    ```



