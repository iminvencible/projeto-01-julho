<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    
    if (is_numeric($numero) && $numero > 0 && $numero == (int)$numero) {
        $numero = (int)$numero;
        $numeroValido = true;
    } else {
        $numeroValido = false;
    }
} else {
    header("Location: index.html");
    exit();
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada do <?php echo $numeroValido ? $numero : 'Erro'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="result-container">
        <?php if ($numeroValido): ?>
            <div class="result-header">
                <h1>Tabuada do <span class="numero-destaque"><?php echo $numero; ?></span></h1>
                <p>Resultado da multiplicação usando estrutura de repetição (for)</p>
            </div>
            
            <div class="tabuada-grid">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "<div class='tabuada-item'>";
                    echo "$numero × $i = <span class='resultado'>$resultado</span>";
                    echo "</div>";
                }
                ?>
            </div>
            
            <div style="text-align: center;">
                <a href="index.html" class="btn-voltar">← Calcular Nova Tabuada</a>
            </div>
            
        <?php else: ?>
            <div class="error-message">
                <h2>Erro na Entrada</h2>
                <p><strong>O valor informado não é válido!</strong></p>
                <p>Por favor, digite apenas números inteiros positivos (maiores que zero).</p>
                <p>Valor recebido: <strong><?php echo htmlspecialchars($numero); ?></strong></p>
            </div>
            
            <div style="text-align: center;">
                <a href="index.html" class="btn-voltar">← Tentar Novamente</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>