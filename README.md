# Gerenciamento de Estoque para Agronegócio Familiar

Este projeto é uma aplicação desenvolvida em Laravel que visa gerenciar o estoque, planejamento, financeiro e equipamentos para pequenos produtores rurais. A aplicação inclui funcionalidades de autenticação e gerenciamento de usuários utilizando Laravel Sanctum para gerar tokens de acesso.

## Funcionalidades

-   **Autenticação de Usuários:**
    -   Registro de novos usuários.
    -   Login de usuários com geração de token de acesso.
    -   Logout de usuários com invalidação do token de acesso.
-   **Gerenciamento de Eventos:**

    -   CRUD (Create, Read, Update, Delete) de eventos relacionados ao planejamento.

-   **Gerenciamento Financeiro:**

    -   CRUD de registros financeiros para monitorar entradas e saídas.

-   **Gerenciamento de Estoque:**

    -   CRUD de itens no estoque, permitindo controle de produtos disponíveis.

-   **Gerenciamento de Equipamentos:**
    -   CRUD de equipamentos, permitindo controle e rastreamento de máquinas e ferramentas.

## Tecnologias Utilizadas

-   **Laravel:** Framework PHP para desenvolvimento da aplicação.
-   **Laravel Sanctum:** Biblioteca para autenticação de usuários via tokens.
-   **MySQL:** Banco de dados relacional para armazenamento das informações.
-   **PHP:** Linguagem de programação utilizada no backend.

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/ThalesTonon/api_agrotracker.git

    cd api_agrotracker
    ```

2. Instale as dependências do projeto:
    ```bash
    composer install
    ```
3. Configure o arquivo .env com as informações do banco de dados e outras configurações necessárias:

    ```bash
    cp .env.example .env

    php artisan key:generate
    ```

4. Execute as migrações para criar as tabelas no banco de dados:
    ```bash
    php artisan migrate
    ```
5. Inicie o servidor de desenvolvimento:
    ```bash
    php artisan serve
    ```

### Conclusão

Esse arquivo `README.md` fornece uma documentação clara e organizada das APIs do seu projeto, incluindo como configurar e utilizar a aplicação, e detalhes sobre cada rota disponível. É importante ajustar as URLs e parâmetros conforme necessário, dependendo das suas implementações finais.
