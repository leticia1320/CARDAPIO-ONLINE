<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'];
    $telefone = $_POST['telefone'];
    $msgcliente = $_POST['message'];

    $mensagem .= "Nome: " . $nome . "\n";
    $mensagem .= "Telefone: " . $telefone . "\n";
    $mensagem .= "Mensagem: " . $msgcliente . "\n";
    
    $mensagemLimpa = urlencode($mensagem);

    $numeroWhatsApp = "+551154339681";
    $linkWhatsApp = "https://wa.me/" . $numeroWhatsApp . "?text=" . $mensagemLimpa;

    header("Location: " . $linkWhatsApp);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kimchi House - Cardápio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/logo3.png" class="rounded-circle" type="image/png">
    <style>
        body {
            background: linear-gradient(to right, #9b59b6, #b47bb3);
            color: white;
        }
        .navbar {
            background-color: #8e44ad;
        }
        .navbar-brand {
            color: white;
        }
        .nav-tabs .nav-link {
            background-color: #b47bb3;
            color: white;
        }
        .nav-tabs .nav-link.active {
            background-color: #9b59b6;
            color: white;
        }
        .tab-pane {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            padding: 20px;
        }
        .card-body {
            background-color: #fff;
            border-radius: 5px;
        }
        .card-body h5, .card-body p {
            color: #333;
        }
        .footer {
            background-color: #8e44ad;
            color: white;
        }
        .form-control {
            background-color: #f0e7f7;
            border-color: #9b59b6;
            color: #333;
        }
        .card-title {
            color: #9b59b6; /* Alterado para roxo */
        }
        .card-text {
            color: #333; /* Preto mais suave */
        }
        .card-price {
            color: #8e44ad; /* Cor de preço em roxo */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="assets/kimchi house.jpg" alt="Kimchi House" style="width:45px;height:45px; margin-right: 25px;">
            <a class="navbar-brand" href="#">Kimchi House</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Início</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <!-- Navegação entre as abas -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bebidas-tab" data-toggle="tab" href="#bebidas" role="tab" aria-controls="bebidas" aria-selected="false">Bebidas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contato-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contato" aria-selected="false">Contato</a>
            </li>
        </ul>
        
        <div class="tab-content mt-4" id="myTabContent">
            <!-- Cardápio -->
            <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                <h2 class="text-center mb-4">Nosso Cardápio</h2>
                <h3>Pratos Principais</h3>
                <div class="row">
                    <?php
                    $pratos = [
                        ["bibimbap.jpg", "Bibimbap – 비빔밥", "R$ 55,00", "Arroz branco misturado com vegetais e carne, servido com gochujang (pimenta coreana), óleo de gergelim e ovo frito."],
                        ["samgyeopsal.jpg", "Samgyeopsal – 삼겹살", "R$ 65,00", "Fatias de barriga de porco grelhadas na hora, servidas com acompanhamentos como alface, pasta de alho e molho de pimenta coreano (ssamjang)."],
                        ["Bulgogi.jpg", "Bulgogi – 불고기", "R$ 59,00", "Carne bovina marinada em molho de soja, açúcar, alho, óleo de gergelim e outros temperos, grelhada na chapa. Acompanha arroz e vegetais."],
                        ["ttokbokki.jpg", "Tteokbokki – 떡볶이", "R$ 39,00", "Bolinhos de arroz (tteok) em molho apimentado e doce, geralmente com peixe frito ou ovos cozidos."],
                        ["Jeyuk-Bokkeum.jpg", "Jeyuk Bokkeum – 제육볶음", "R$ 49,00", "Carne de porco picante, marinada com gochujang (pasta de pimenta coreana) e outros temperos, depois salteada com cebolas e vegetais."],
                        ["sundubu-jjigae.jpg", "Sundubu-jjigae – 순두부찌개", "R$ 55,00", "Sopa apimentada com tofu macio (sundubu), frutos do mar ou carne, e um caldo rico e picante."],
                        ["kimchi-jjigae.jpg", "Kimchi-jjigae – 김치찌개", "R$ 55,00", "Sopa coreana feita com kimchi, carne bovina, tofu e cebolinha verde. Acompanha arroz branco."],
                        ["jjajangmyeon.jpg", "Jjajangmyeon – 짜장면", "R$ 55,00", "Macarrão de trigo sarraceno preparado com legumes salteados em pasta de soja preta (jjajang) e carne bovina. Acompanha kimchi e pepino fatiado."],
                        ["Galbi-tang.jpg", "Galbi-tang – 갈비탕", "R$ 59,00", "Sopa com costela bovina, macarrão de batata e cebolinha verde. Acompanha arroz branco, kimchi e pasta de pimenta."],
                        ["Hoe-deopbap.jpg", "Hoe-deopbap – 회덮밥", "R$ 59,00", "Arroz branco misturado com salmão em cubos, alface americana, alface crespa roxa, rúcula, pepino, molho gochujang (pimenta coreana) e óleo de gergelim."],
                        ["Mul-Naengmyeon.jpg", "Mul-Naengmyeon – 물냉면", "R$ 55,00", "Macarrão de trigo sarraceno servido com caldo de carne gelado, carne, fatias de pepino e nabo temperados, e ovo cozido. Acompanha kimchi."],
                        ["Bibim-Naengmyeon.jpg", "Bibim-Naengmyeon – 비빔냉면", "R$ 55,00", "Macarrão de trigo sarraceno servido com molho picante gochujang (pasta de pimenta), ovo cozido, pepino e cebolinha verde."],
                        ["Tteok-Manduguk.jpg", "Mandu – 만두", "R$ 39,00", "Pastéis coreanos recheados com carne de porco, legumes, gochujang (pasta de pimenta), servidos com molho de soja e vinagre."],
                        ["jjamppong.jpg", "Jjamppong – 짬뽕", "R$ 59,00", "Sopa apimentada com macarrão, frutos do mar (camarão, lula, mexilhão), cebola, alho, repolho, cenoura e cebolinha verde. Acompanha kimchi."]
                    ];

                    foreach ($pratos as $prato) {
                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <img src='assets/{$prato[0]}' class='card-img-top' alt='{$prato[1]}'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$prato[1]}</h5>
                                    <p class='card-price'>{$prato[2]}</p>
                                    <p>{$prato[3]}</p>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>

            <!-- Bebidas -->
            <div class="tab-pane fade" id="bebidas" role="tabpanel" aria-labelledby="bebidas-tab">
                <h3>Bebidas Alcoólicas</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/soju.jpg" class="card-img-top" alt="Soju" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Soju</h5>
                                <p class="card-price">R$ 15,00</p>
                                <p>Tradicional bebida coreana de arroz, com sabor suave e leve.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/makgeolli.jpg" class="card-img-top" alt="Makgeolli" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Makgeolli</h5>
                                <p class="card-price">R$ 18,00</p>
                                <p>Bebida fermentada de arroz, doce e levemente ácida.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/cerveja1.jpg" class="card-img-top" alt="Cerveja" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Cerveja</h5>
                                <p class="card-price">R$ 12,00</p>
                                <p>Cerveja gelada, perfeita para acompanhar qualquer prato!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Bebidas Não Alcoólicas</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/agua.jpg" class="card-img-top" alt="Água" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Água</h5>
                                <p class="card-price">R$ 4,00</p>
                                <p>Água mineral em garrafa de 330ml.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/refrigerantes.jpg" class="card-img-top" alt="Refrigerante" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Refrigerante</h5>
                                <p class="card-price">R$ 6,00</p>
                                <p>Escolha entre sabores variados (Coca-Cola, Sprite, Fanta).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/ice-americano.jpg" class="card-img-top" alt="Ice Americano" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Ice Americano</h5>
                                <p class="card-price">R$ 8,00</p>
                                <p>Café gelado, forte e refrescante, perfeito para os amantes de café.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Sucos Naturais</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="assets/suco.jpg" class="card-img-top" alt="Suco Natural" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Suco Natural</h5>
                                <p class="card-price">R$ 9,00</p>
                                <p>Escolha entre os sabores: Laranja, Morango, Abacaxi, etc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contato -->
            <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab">
                <h3>Entre em Contato</h3>
                <form action="index.php" method="POST">
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
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer py-3 text-center">
        <font color="black">&copy; 2024 Kimchi House. Todos os direitos reservados. Desenvolvido por Leticia Silva Lima.</font>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
