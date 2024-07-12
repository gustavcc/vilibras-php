<?php
session_start();
// se não tiver logado, vai para o login
if (!isset($_SESSION['login-admin'])) {
    header("Location: ../admin/loginAdmin.php?");
    exit();
} ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard ADM | VILIBRAS</title>

    <link rel="icon" href="../../../public/images/Logo.png">
    <link rel="stylesheet" href="../../../public/css/dashboardAdmin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div style="padding-right: 10px;" class="logo">
            <img src="../../../public/images/Logo.png" alt="logo">
        </div>
        <a class="navbar-brand" href="#">ADM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> -->
        </ul>
        </div>
    </div>
    </nav>

    <main>
        <div class="card" style="width: 18rem;">
            <img style="height: 10rem;" src="../../../public/images/o-que-e-banco-de-questoes.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Questões</h5>
                <p class="card-text">Edit, Delete and Insert datas.</p>
                <div class='options'>
                    <a href='../../pages/questoes/inserirQuestaoForm.php?>' id='add'> <i class="fa-solid fa-plus"></i> </a>
                </div>
                <a href="../questoes/listQuestoes.php" class="btn btn-primary">Listar</a>
            </div>
        </div>
        
        <div class="card" style="width: 18rem;">
            <img style="height: 10rem;" src="../../../public/images/faq.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">FAQ</h5>
                <p class="card-text">Edit, Delete and Insert datas.</p>
                <div class='options'>
                    <a href='../../pages/questoes/editarQuestaoForm.php?id=<?=$questao['id_questao']?>' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a>
                    <a href='../../actions/questoes/excluirQuestao.php?id=<?=$questao['id_questao']?>' id='del'> <i class='fa-solid fa-trash'></i> </a>
                    <a href='../../actions/questoes/excluirQuestao.php?id=<?=$questao['id_questao']?>' id='add'> <i class="fa-solid fa-plus"></i> </a>
                </div>
                <!-- <a href="../faq/faq.php" class="btn btn-primary">Listar</a> -->
            </div>
        </div>
        
        <div class="card" style="width: 18rem;">
            <img style="height: 10rem;" src="../../../public/images/libras-maos.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Dicionário</h5>
                <p class="card-text">Edit, Delete and Insert datas.</p>
                <div class='options'>
                    <a href='../../pages/dicionario/editContentForm.php?>' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a>
                    <a href='../../pages/dicionario/removeContentForm.php?>' id='del'> <i class='fa-solid fa-trash'></i> </a>
                    <a href='../../pages/dicionario/addContentForm.php?>' id='add'> <i class="fa-solid fa-plus"></i> </a>
                </div>
                <a href="../questoes/questoes.php" class="btn btn-primary">Listar</a>
            </div>
        </div>
        
        <div class="card" style="width: 18rem;">
            <img style="height: 10rem;" src="../../../public/images/aulas.webp" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Aulas</h5>
                <p class="card-text">Edit, Delete and Insert datas.</p>
                <div class='options'>
                    <a href='../../pages/questoes/editarQuestaoForm.php?id=<?=$questao['id_questao']?>' id='edit'> <i class='fa-solid fa-pen-to-square'></i> </a>
                    <a href='../../actions/questoes/excluirQuestao.php?id=<?=$questao['id_questao']?>' id='del'> <i class='fa-solid fa-trash'></i> </a>
                    <a href='../../actions/questoes/excluirQuestao.php?id=<?=$questao['id_questao']?>' id='add'> <i class="fa-solid fa-plus"></i> </a>
                </div>
                <a href="../aulas/aulas.php" class="btn btn-primary">Listar</a>
            </div>
        </div>  
        
    </main>
</body>
</html>