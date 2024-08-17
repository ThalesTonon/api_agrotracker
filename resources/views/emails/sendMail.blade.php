<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #106D4A;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-header img {
            max-width: 150px;
        }

        .email-content {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }

        .email-footer {
            background-color: #f1f1f1;
            color: #666666;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        .email-footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <a href="http://agrotracker.thalestonon.com.br/login">
                <img src="https://thalestonon.com.br/img/agroTrackerLogo.png" alt="Logo AgroTracker">
            </a>
            <h1>Mensagem AgroTracker</h1>
        </div>
        <div class="email-content">
            <p>{{ $details['body'] }}</p>

        </div>
        <div class="email-footer">
            <p>© {{ date('Y') }} AgroTracker. Todos os direitos reservados.</p>
            <a href="https://agrotracker.thalestonon.com.br/">Visite nosso site</a>
            <a href="https://agrotracker.thalestonon.com.br/contato">Contato</a>
            <a href="https://agrotracker.thalestonon.com.br/termos">Termos</a>
        </div>
    </div>
</body>

</html>