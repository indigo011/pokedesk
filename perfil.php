<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/form.css">
        <link rel="stylesheet" href="./styles/perfil.css">
        <title>Perfil</title>
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
                        <a href="./perfil.html">
                            <img src="./assets/images/profile-icon.png" alt="user profile picture" class="menu-img" width="40px">
                        </a>
                    </div>
        </header>
        <main class="main-container">
            <div class="main-card">
                <section class="information-section">
                    <p class="information-title">Meus dados</p>
                    <form action="" class="information-form">
                        <input type="text" placeholder="Nome completo" class="input">
                        <input type="email" placeholder="nome@exemplo.com" class="input">

                        <label for="avatar" class="avatar-btn input">Avatar</label>
                        <input type="file" name="avatar" id="avatar">
                        <button class="primary-btn btn" type="submit">Atualizar o perfil</button>
                    </form>
                </section>

                <section class="password-section">
                    <p class="password-title">Mudar a senha</p>
                    <form action="" class="password-form">
                        <input type="password" placeholder="Senha antiga" class="input">
                        <input type="password" placeholder="Nova senha" class="input">
                        <button class="primary-btn btn" type="submit">Alterar a senha</button>
                    </form>
                </section>
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

