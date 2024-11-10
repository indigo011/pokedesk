<?php 
    require_once("conexaobd.php");

    if (!empty($_POST)) {
        if ($_POST['id']) {
            $dados = $_POST;

            $query = "UPDATE chamado SET titulo        = '{$dados['titulo_chamado']}', 
                                         categoria_id  = '{$dados['categoria']}', 
                                         prioridade_id = '{$dados['prioridade']}', 
                                         descricao     = '{$dados['descricao_chamado']}'
                                     WHERE id = '{$dados['id']}'";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "Erro ao atualizar o chamado: " . mysqli_error($conn);
            } else {
                echo "<script>
                        alert('Registro atualizado com sucesso!');
                        location.href='listar_chamados.php';
                      </script>";
            }

        } else {

            $titulo_chamado = $_POST['titulo_chamado'];
            $categoria = (int) $_POST['categoria'];
            $prioridade = (int) $_POST['prioridade'];
            $descricao_chamado = $_POST['descricao_chamado'];
    
            $query = "INSERT INTO chamado (titulo, categoria_id, prioridade_id, descricao) VALUES 
                ('$titulo_chamado', $categoria, $prioridade, '$descricao_chamado');
            ";
    
            $result = mysqli_query($conn, $query);
    
            if (!$result) {
                echo "Erro ao cadastrar o chamado: " . mysqli_error($conn);
            } else {
                echo "<script>
                        alert('Registro cadastrado com sucesso!');
                        location.href='listar_chamados.php';
                      </script>";
            }
        }
    }

    if (!empty($_GET['id'])) {
        $update = 'Editar';
        $id = $_GET['id'];
        $query = "SELECT * FROM chamado WHERE id='{$id}'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $titulo = $row['titulo'];
            $categoria_id = $row['categoria_id'];
            $prioridade_id = $row['prioridade_id'];
            $descricao = $row['descricao']; 
        }
                
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/form.css">
    <title><?= $update ?? 'Criar' ?> chamado</title>
</head>
<body>
    <header class="header">
        <a href="./form_chamado.php">
            <h1 class="header-txt">pokéDesk</h1>
        </a>
        <div class="header-menu">
            <a href="./listar_chamados.php" class="menu-link">Meus chamados</a>
            <a href="./form_chamado.php">
                <button class="menu-btn primary-btn">Novo chamado</button>
            </a>
            <a href="./perfil.html">
                <img src="./assets/images/profile-icon.png" alt="user profile picture" class="menu-img" width="40px">
            </a>

        </div>

    </header>

    <main class="main-container">
        <h2 class="form-title"><?= $update ?? 'Cadastrar um novo' ?> chamado</h2>

        <form action="" method="post" class="main-form">
            <input type="hidden" name="id" value="<?= $id ?? '' ?>">
            <div class="input-wrapper">
                <label for="titulo_chamado" class="form-label">Título do chamado *</label>
                <input type="text" name="titulo_chamado" id="titulo_chamado" class="form-input input" placeholder="Você precisa de ajuda com o quê?" required value="<?= $titulo ?? '' ?>">
            </div>
            
            <div class="input-wrapper">
                <label for="categoria" class="form-label">Categoria *</label>
                <select name="categoria" id="categoria" class="form-select input" placeholder="Escolha uma">
                    <option value="">Selecione</option>
                    <?php 

                        $query = "SELECT * FROM categoria ORDER BY nome;";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            
                           while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $nome = $row['nome'];
                                $selected = (($categoria_id ?? '') == $id) ? 'selected' : '';
                                echo "<option value=\"$id\" $selected>$nome</option>";
                           }     

                        }
                    
                    ?>
                </select>
            </div>
            
            <div class="input-wrapper">
                <label for="prioridade" class="form-label">Prioridade *</label>
                <select name="prioridade" id="prioridade" class="form-select input">
                    <option value="">Selecione</option>
                        <?php 

                            $query = "SELECT * FROM prioridade ORDER BY nome;";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $nome = $row['nome'];
                                        $selected = (($prioridade_id ?? '') == $id) ? 'selected' : '';
                                        echo "<option value=\"$id\" $selected>$nome</option>";
                                }     

                            }
                        
                        ?>
                </select>
            </div>
            
            <div class="input-wrapper">
                <label for="descricao-chamado" class="form-label">Detalhes do chamado *</label>
                <textarea name="descricao_chamado" id="descricao_chamado" class="form-textarea input" placeholder="Descreva melhor o problema" maxlength="255" required><?= $descricao ?? '' ?></textarea>
            </div>
            
            <button class="form-btn primary-btn"><?= $update ?? "Cadastrar" ?></button>
        </form>
    </main>

    <hr class="section-line">

    <footer class="footer">
        <p class="footer-logo">pokéDesk</p>
        <hr class="section-line">
        <p class="footer-txt"><small>© 2024 Trabalho de Web I. Todos os direitos reservados</small></p>  
    </footer>
   
</body>
</html>