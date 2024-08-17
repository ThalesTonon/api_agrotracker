<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API AgroTracker</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px;
        }

        h1 {
            color: #4CAF50;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        p {
            font-size: 1.2em;
            margin-top: 10px;
        }

        code {
            display: block;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
            font-size: 1em;
            white-space: pre-line;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>API AgroTracker</h1>
        <p>Bem-vindo à API da aplicação AgroTracker!</p>
        <p>Esta URL é parte da API que suporta o sistema de gerenciamento de estoque para agronegócio familiar.</p>

        <h2>Autenticação</h2>
        <p><strong>Registrar Usuário:</strong></p>
        <code>
            POST /api/register
            Parâmetros: name, email, password, password_confirmation
        </code>

        <p><strong>Login:</strong></p>
        <code>
            POST /api/login
            Parâmetros: email, password
        </code>

        <p><strong>Logout:</strong></p>
        <code>
            POST /api/logout
            Headers: Authorization: Bearer {seu_token}
        </code>

        <h2>Usuários</h2>
        <p><strong>Listar Usuários:</strong></p>
        <code>
            GET /api/users
        </code>

        <p><strong>Mostrar Usuário:</strong></p>
        <code>
            GET /api/users/{id}
        </code>

        <p><strong>Atualizar Usuário:</strong></p>
        <code>
            PUT /api/users/{id}
            Parâmetros: name, email, password
        </code>

        <p><strong>Deletar Usuário:</strong></p>
        <code>
            DELETE /api/users/{id}
        </code>

        <h2>Eventos</h2>
        <p><strong>Listar Eventos:</strong></p>
        <code>
            GET /api/events
        </code>

        <p><strong>Mostrar Evento:</strong></p>
        <code>
            GET /api/events/{id}
        </code>

        <p><strong>Criar Evento:</strong></p>
        <code>
            POST /api/events
            Parâmetros: title, description, start, end
        </code>

        <p><strong>Atualizar Evento:</strong></p>
        <code>
            PUT /api/events/{id}
            Parâmetros: title, description, start, end
        </code>

        <p><strong>Deletar Evento:</strong></p>
        <code>
            DELETE /api/events/{id}
        </code>

        <h2>Financeiro</h2>
        <p><strong>Listar Registros Financeiros:</strong></p>
        <code>
            GET /api/financial-records
        </code>

        <p><strong>Mostrar Registro Financeiro:</strong></p>
        <code>
            GET /api/financial-records/{id}
        </code>

        <p><strong>Criar Registro Financeiro:</strong></p>
        <code>
            POST /api/financial-records
            Parâmetros: description, amount, type, date
        </code>

        <p><strong>Atualizar Registro Financeiro:</strong></p>
        <code>
            PUT /api/financial-records/{id}
            Parâmetros: description, amount, type, date
        </code>

        <p><strong>Deletar Registro Financeiro:</strong></p>
        <code>
            DELETE /api/financial-records/{id}
        </code>

        <h2>Estoque</h2>
        <p><strong>Listar Itens no Estoque:</strong></p>
        <code>
            GET /api/inventory
        </code>

        <p><strong>Mostrar Item no Estoque:</strong></p>
        <code>
            GET /api/inventory/{id}
        </code>

        <p><strong>Criar Item no Estoque:</strong></p>
        <code>
            POST /api/inventory
            Parâmetros: name, quantity, price, description
        </code>

        <p><strong>Atualizar Item no Estoque:</strong></p>
        <code>
            PUT /api/inventory/{id}
            Parâmetros: name, quantity, price, description
        </code>

        <p><strong>Deletar Item no Estoque:</strong></p>
        <code>
            DELETE /api/inventory/{id}
        </code>

        <h2>Equipamentos</h2>
        <p><strong>Listar Equipamentos:</strong></p>
        <code>
            GET /api/equipment
        </code>

        <p><strong>Mostrar Equipamento:</strong></p>
        <code>
            GET /api/equipment/{id}
        </code>

        <p><strong>Criar Equipamento:</strong></p>
        <code>
            POST /api/equipment
            Parâmetros: name, type, quantity, description
        </code>

        <p><strong>Atualizar Equipamento:</strong></p>
        <code>
            PUT /api/equipment/{id}
            Parâmetros: name, type, quantity, description
        </code>

        <p><strong>Deletar Equipamento:</strong></p>
        <code>
            DELETE /api/equipment/{id}
        </code>
    </div>
</body>

</html>