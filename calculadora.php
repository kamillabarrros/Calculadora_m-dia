
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css\index.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="form_calc">
    <form action="calculadora.php" method="post" >
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Média 01</label>
        <input name="media01" type="number" class="form-control" id="media01" placeholder="média 01">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Média 02</label>
        <input name="media02" type="number" class="form-control" id="media02" placeholder="média 02">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Média 03</label>
        <input name="media03" type="number" class="form-control" id="media03" placeholder="média 03">
        <label for="exampleFormControlInput1" class="form-label">Média 04</label>
        <input name="media04" type="number" class="form-control" id="media04" placeholder="média 04">
        <button type="submit" class="btn" value="calcular">Enviar</button>
    </form>  
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $media01 = isset($_POST['media01']) ? (float)$_POST['media01'] : 0;
    $media02 = isset($_POST['media02']) ? (float)$_POST['media02'] : 0;
    $media03 = isset($_POST['media03']) ? (float)$_POST['media03'] : 0;
    $media04 = isset($_POST['media04']) ? (float)$_POST['media04'] : 0;

    $media = ($media01 + $media02 + $media03 + $media04) / 4;

  
    if ($media >= 9) {
        $conceito = 'A';
        $mensagem = "Aprovado com Louvor";
    } elseif ($media >= 7) {
        $conceito = 'B';
        $mensagem = "Aluno Aprovado";
    } elseif ($media >= 4) {
        $conceito = 'C';
        $mensagem = "Recuperação, sua chance de passar";
    } else {
        $conceito = 'D';
        $mensagem = "Poxa vida, vamos tentar novamente ano que vem";
    }

  
    echo "<h1>Média: " . number_format($media) . "</h1>";
    echo "<h2>Conceito: " . $conceito . "</h2>";
    echo "<p>" . $mensagem . "</p>";

    if ($conceito === 'C') {
        echo '<h3>Formulário de Recuperação</h3>';
        echo '<form action="verifica_recuperacao.php" method="post">';
        echo '<input type="hidden" name="media_bimestral" value="' . number_format($media) . '">';
        echo '<label for="nota_recuperacao">Nota da Recuperação:</label>';
        echo '<input type="number" id="nota_recuperacao" name="nota_recuperacao" step="0.01" required><br><br>';
        echo '<input type="submit" value="Verificar Recuperação">';
        echo '</form>';
    }
} else {
    echo "Dados não enviados corretamente.";
}
?>
