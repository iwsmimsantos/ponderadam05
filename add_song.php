<?php
// Inclui o arquivo de configuração do banco de dados
include 'db-config.php';

$message = '';

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos obrigatórios foram preenchidos
    if (!empty($_POST['title']) && !empty($_POST['album'])) {
        try {
            // Criar conexão com o banco de dados
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Preparar e executar a consulta SQL para inserir a música
            $stmt = $conn->prepare("INSERT INTO billie_songs (title, album, release_date, chart_position) 
                                    VALUES (:title, :album, :release_date, :chart_position)");
            
            $stmt->bindParam(':title', $_POST['title']);
            $stmt->bindParam(':album', $_POST['album']);
            $stmt->bindParam(':release_date', $_POST['release_date']);
            $stmt->bindParam(':chart_position', $_POST['chart_position']);
            
            $stmt->execute();
            
            $message = "Música adicionada com sucesso!";
        } catch(PDOException $e) {
            $message = "Erro: " . $e->getMessage();
        }
        
        // Fechar conexão
        $conn = null;
    } else {
        $message = "Título e álbum são obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Música da Billie Eilish</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
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
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type=text], input[type=date], input[type=number] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .message {
            margin: 20px 0;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adicionar Nova Música da Billie Eilish</h1>
        
        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, "sucesso") !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            
            <div class="form-group">
                <label for="album">Álbum:</label>
                <input type="text" id="album" name="album" required>
            </div>
            
            <div class="form-group">
                <label for="release_date">Data de Lançamento:</label>
                <input type="date" id="release_date" name="release_date">
            </div>
            
            <div class="form-group">
                <label for="chart_position">Posição nas Paradas:</label>
                <input type="number" id="chart_position" name="chart_position" min="1">
            </div>
            
            <input type="submit" value="Adicionar Música">
        </form>
        
        <a href="index.php">Voltar para a página inicial</a>
    </div>
</body>
</html>