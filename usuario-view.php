<?php
require 'conexao.php';

?>

<!doctype html>
<html lang="en">

<head>
    <title>Usuário visualizar</title>
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
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visualizar usuário
                                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $usuario_id = mysqli_real_escape_string($soyedinyat, $_GET['id']);
                                $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                                $query = mysqli_query($soyedinyat, $sql);

                                if (mysqli_num_rows($query) > 0) {
                                    $usuario = mysqli_fetch_array($query);
                            ?>
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <p class="form-control"><?= $usuario['nome']; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control"><?= $usuario['email']; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Data de nascimento</label>
                                        <p class="form-control"><?= date('d/m/Y', strtotime($usuario['data_nascimento'])); ?></p>
                                    </div>
                            <?php
                                } else {
                                    echo "<h5> Usuário não encontrado</h5>";
                                }
                            }
                            ?>
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