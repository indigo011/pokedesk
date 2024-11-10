<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/list.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
        <title>Listar chamados</title>
    </head>
    <body>
        <header class="header">
            <a href="./index.php">
                <h1 class="header-txt">pokéDesk</h1>
            </a>
            <div class="header-menu">
                <a href="./index.php" class="menu-link">Meus chamados</a>
                <a href="./form_chamado.php">
                    <button class="menu-btn primary-btn">Novo chamado</button>
                </a>
                <a href="./perfil.php">
                    <img src="./assets/images/profile-icon.png" alt="user profile picture" class="menu-img" width="40px">
                </a>
            </div>
        </header>

        <main class="main-container">
            <div class="header-container">
                <h2 class="form-title">Todos os chamados</h2>
                <p>Status</p>
                <div class="status-filter-container">
                    <button class="filter">A fazer</button>
                    <button class="filter">Feito</button>
                </div>
            </div>

            <div class="search">
                <span class="search-icon material-symbols-outlined">search</span>
                <input type="search" class="search-input input" placeholder="Digite algo para pesquisar">
            </div>

            <div class="task-wrapper">
                <div class="category-filter-container">
                    <p>Categoria</p>
                    <button class="filter">Hardware</button>
                    <button class="filter">Software</button>
                    <button class="filter">Rede</button>
                </div>

                <div class="task-list-container">
                    <?php 
                        $conn = mysqli_connect('localhost', 'root', '', 'pokedesk');

                        if (!mysqli_connect_error()) {
                            $query = "SELECT * FROM chamado ORDER BY id DESC";
                            $result = mysqli_query($conn, $query);
                            
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $titulo = $row['titulo'];
                                    $descricao = $row['descricao'];
                                    
                                    echo "
                                        <div class=\"task-card\">
                                            <h3 class=\"task-card-title\">$titulo</h3>
                                            <p class=\"task-card-description\">$descricao</p>
                                            <div class=\"task-card-actions\">
                                                <a href=\"./form_chamado.php?id={$id}\">
                                                    <img src=\"./assets/images/edit-icon.png\" alt=\"edit icon\" height=\"25px\">
                                                </a>
                                                <a href=\"./chamado_delete.php?id={$id}\">
                                                    <img src=\"./assets/images/delete-icon.png\" alt=\"delete icon\" height=\"25px\">
                                                </a>
                                            </div>
                                            <span class=\"task-status\">A fazer</span>
                                        </div>
                                    ";
                                }
                            } else {
                                echo "Erro: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                        } else {
                            echo "Não foi possível conectar: " . mysqli_connect_error();
                        }
                    ?>   
                </div>
            </div>

        </main>

        <hr class="section-line">

        <footer class="footer">
            <p class="footer-logo">pokéDesk</p>
            <hr class="section-line">
            <p class="footer-txt"><small>© 2024 Trabalho de Web I. Todos os direitos reservados</small></p>  
        </footer>

    </body>
</html>