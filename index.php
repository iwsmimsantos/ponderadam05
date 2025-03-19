<!DOCTYPE html>
<html>
<head>
    <title>AWS Sample Application - Billie Eilish Songs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 0;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>AWS Sample Application</h1>
        <h2>Gerenciador de Músicas da Billie Eilish</h2>
        
        <ul>
            <li><a href="view_songs.php">Ver todas as músicas</a></li>
            <li><a href="add_song.php">Adicionar nova música</a></li>
        </ul>

        <hr>
        <p>Este aplicativo foi criado para demonstrar a integração de uma aplicação web com Amazon RDS.</p>

        <?php
        // Informações da aplicação
        echo '<h3>Informações da Instância:</h3>';
        echo 'Server IP: ' . $_SERVER['SERVER_ADDR'] . '<br>';
        echo 'Server Software: ' . $_SERVER['SERVER_SOFTWARE'] . '<br>';
        echo 'Document Root: ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
        ?>
    </div>
</body>
</html>