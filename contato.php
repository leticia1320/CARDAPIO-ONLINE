<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $nome = $_POST['name'];
    $telefone = $_POST['telefone'];
    $msgcliente = $_POST['message'];

    // Montar a mensagem com os dados do pedido
    $mensagem = "Nome: " . $nome . "\n";
    $mensagem .= "Telefone: " . $telefone . "\n";
    $mensagem .= "Mensagem: " . $msgcliente . "\n";
    
    // Limpar a mensagem para uso em uma URL
    $mensagemLimpa = urlencode($mensagem);

    // Gerar o link direto do WhatsApp
    $numeroWhatsApp = "+5511961833139"; // Substitua pelo número do seu WhatsApp
    $linkWhatsApp = "https://wa.me/" . $numeroWhatsApp . "?text=" . $mensagemLimpa;

    // Redirecionar para o link do WhatsApp
    header("Location: " . $linkWhatsApp);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kimchi House</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logo3.png" class="rounded-circle" type="image/png">
</head>

<body>
    <!-- Cabeçalho com menu de navegação -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <img src="img/logo3.png" alt="Kimchi House" style="width:45px;height:45px; margin-right: 25px;">
            <a class="navbar-brand" href="#">Kimchi House</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Cardápio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Seção de Contato -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Entre em Contato com a Kimchi House</h2>
            <div class="row">
                <!-- Formulário de Contato -->
                <div class="col-md-6">
                    <form action="" method="post" class="needs-contact" novalidate>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                    </form>
                </div>

                <!-- Informações de Contato -->
                <div class="col-md-6">
                    <style>
                        .corner-image {
                            width: 200px;
                            height: 200px;
                            border-radius: 50%;
                            float: right;
                        }
                    </style>
                    <br><img src="img/logo1.png" class="corner-image">
                    <br><br><br><br><br><br>
                    <h6><b>Endereço:</b></h6>
                    R. Engenheiro Caio Dias Batista, 71D<br>
                    São Paulo - SP<br>
                    CEP: 04470-090<br>
                    <br><b>Telefone:</b> (11) 954339681
                </div>
            </div>
        </div>
    </section>

    <footer class="text-white py-3 text-center" style="background-color: #9b59b6;">
        <font color="black">&copy; 2024 Kimchi House. Todos os direitos reservados. Desenvolvido por Leticia Silva Lima.</font>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
