<?php
include('header.php');

$data_nascimento = trim($_POST['data_nascimento']); // Formato: yyyy-mm-dd

$data_nascimento_formatada = DateTime::createFromFormat('Y-m-d', $data_nascimento);

// Verificar se a data foi criada corretamente
// if (!$data_nascimento_formatada) {
//     echo "<h1>Erro: Ocorreu um problema ao processar a data de nascimento.</h1>";
//     exit;
// }

$signos = simplexml_load_file("signos.xml", null, LIBXML_NOCDATA);

$signo_nome = "";
$signo_descricao = "";

foreach ($signos->signo as $signo) {
    $data_inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
    $data_fim = DateTime::createFromFormat('d/m', $signo->dataFim);

    $data_inicio->setDate($data_nascimento_formatada->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
    $data_fim->setDate($data_nascimento_formatada->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

    if ($data_fim < $data_inicio) {
        $data_fim->setDate($data_nascimento_formatada->format('Y') + 1, $data_fim->format('m'), $data_fim->format('d'));
    }

    if ($data_nascimento_formatada >= $data_inicio && $data_nascimento_formatada <= $data_fim) {
        $signo_nome = $signo->signoNome;
        $signo_descricao = $signo->descricao;
        break; 
    }
}

// Verificar se o signo foi encontrado
// if (empty($signo_nome) || empty($signo_descricao)) {
//     echo "<h1>Erro: Não foi possível determinar o seu signo.</h1>";
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <div class="container bg-info pt-5 pb-5 text-center">
        <div class="pt-3">
            <h1>Qual é o seu signo?</h1>
        </div>
        <div>
            <h3 class="py-3">
                <?php echo strtoupper($signo_nome); ?>
            </h3>
            <div>
                <p class="px-5 fs-5">
                    <?php echo $signo_descricao; ?>
                </p>
            </div>
            <div class="py-3">
                <a href="index.php">
                    <button class="btn btn-light">Nova consulta</button>
                </a>         
            </div>
        </div>
    </div>

    <footer class="text-white text-center my-5 py-2">
        <div>
            <p><strong>Neissandy da Silva Costa</strong></p>
            <p>Programação Web - Unopar </p>
        </div>
    </footer>
</body>
</html>
