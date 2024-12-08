<!DOCTYPE html>
<html lang="pt-BR">
<?php include('header.php'); ?>  

<body>
    <div class="container bg-info pt-5 pb-5 text-center">
        <div >
            <h1>Descubra o seu signo: </h1>
        </div>
        <form method="POST" id="signo-form" action="show_zodiac_sign.php" >
            <div class="py-3">
                <div>
                    <label for="data_nascimento" class="fs-5">Data de nascimento</label>
                </div>
                <div class="pb-3">
                    <input type="date" id="data_nascimento" name="data_nascimento" required>
                </div>
                <a>
                    <button type="submit" class="btn btn-light">Descobrir</button>
                </a>
            </div>
        </form>
    </div>

    <footer class="text-white text-center my-5 py-2">
        <div>
            <p><strong>Neissandy da Silva Costa</strong></p>
            <p>Programação Web - Unopar </p>
        </div>
    </footer>
</body>


