<?php
// Inclui o arquivo de configuração do banco de dados
include 'db-config.php';

try {
    // Criar conexão com o banco de dados
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta SQL para buscar todas as músicas
    $stmt = $conn->prepare("SELECT * FROM billie_songs ORDER BY release_date DESC");
    $stmt->execute();
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    $error = "Erro de conexão: " . $e->getMessage();
}

// Fechar conexão
$conn = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Músicas da Billie Eilish</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Músicas da Billie Eilish</h1>
        
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php else: ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Álbum</th>
                    <th>Data de Lançamento</th>
                    <th>Posição nas Paradas</th>
                </tr>
                <?php foreach ($songs as $song): ?>
                <tr>
                    <td><?php echo $song['id']; ?></td>
                    <td><?php echo htmlspecialchars($song['title']); ?></td>
                    <td><?php echo htmlspecialchars($song['album']); ?></td>
                    <td><?php echo $song['release_date']; ?></td>
                    <td><?php echo $song['chart_position']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        
        <a href="index.php">Voltar para a página inicial</a>
    </div>
</body>
</html>