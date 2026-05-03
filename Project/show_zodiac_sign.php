<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <?php
    $data_nascimento = $_POST['data_nascimento'];

    $signos = simplexml_load_file("signos.xml");

    $data_busca = new DateTime($data_nascimento);
    $signo_encontrado = null;

    foreach ($signos->signo as $signo) {
        $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
        $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

        $data_inicio->setDate($data_busca->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
        $data_fim->setDate($data_busca->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

        if ($data_inicio > $data_fim) {
            if ($data_busca >= $data_inicio || $data_busca <= $data_fim) {
                $signo_encontrado = $signo;
                break;
            }
        } else {
            if ($data_busca >= $data_inicio && $data_busca <= $data_fim) {
                $signo_encontrado = $signo;
                break;
            }
        }
    }

    if ($signo_encontrado) {
        echo "<div class='card shadow-lg p-4 text-center'>";
        echo "<h2 class='text-primary mb-3'>{$signo_encontrado->signoNome}</h2>";
        echo "<p class='lead'>{$signo_encontrado->descricao}</p>";
        echo "<a href='index.php' class='btn btn-secondary mt-3'>Voltar</a>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Não foi possível identificar o seu signo.</div>";
        echo "<a href='index.php' class='btn btn-secondary mt-3'>Tentar novamente</a>";
    }
    ?>
</div>

</body>
</html>