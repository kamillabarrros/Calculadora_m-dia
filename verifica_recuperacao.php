<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $media_bimestral = isset($_POST['media_bimestral']) ? (float)$_POST['media_bimestral'] : 0;
    $nota_recuperacao = isset($_POST['nota_recuperacao']) ? (float)$_POST['nota_recuperacao'] : 0;

    $nova_media = ($media_bimestral + $nota_recuperacao);

    if ($nova_media >= 10) {
        echo "<h1>Aprovado com Recuperação</h1>";
    } else {
        echo "<h1>Não Aprovado</h1>";
    }
 
    
    echo "<p>Média final após recuperação: " . number_format($nova_media) . "</p>";
} else {
    echo "Dados não enviados corretamente.";
}
?>
