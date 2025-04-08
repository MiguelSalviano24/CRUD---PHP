<?php
require 'conexao.php';
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <?php include('navbar.php'); ?>
    </header>
    <main>
        <div class="container mt-4">
            <?php include('mensagem.php') ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Lista de usuários
                                <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar usuário</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Data de nascimento</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = 'SELECT * FROM usuarios';
                                    $usuarios = mysqli_query($soyedinyat, $sql);
                                    if (mysqli_num_rows($usuarios) > 0) {
                                        foreach ($usuarios as $usuario) {
                                    ?>
                                            <tr>
                                                <td><?= $usuario['id'] ?></td>
                                                <td><?= $usuario['nome'] ?></td>
                                                <td><?= $usuario['email'] ?></td>
                                                <td><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                                                <td>
                                                    <a href="usuario-view.php?id=<?= $usuario['id'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                                    <a href="usuario-edit.php?id=<?= $usuario['id'] ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="acoes.php" method="POST" class="d-inline">
                                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?= $usuario['id'] ?>" class="btn btn-danger btn-sm">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<h5>Nenhum usuário encontrado</h5>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>