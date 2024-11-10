<?php 

    require_once("./conexaobd.php");

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM chamado WHERE id = '{$id}'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Erro ao deletar o registro: " . mysqli_error($conn);
        } else {
            echo "<script>
                    alert('O chamado foi excluído com sucesso!');
                    location.href='./index.php';
                  </script>";
        }

        mysqli_close($conn); 
    }