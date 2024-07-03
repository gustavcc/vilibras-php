<?php
require_once("../../actions/usuario/identifyUsuarioLogado.php");

// se não tiver logado, vai para o login
if (!isset($_SESSION['login'])) {
    header("Location: ../usuario/login.php?");
    exit();
}?>

<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/perfil.css">
<script src="../../../public/js/perfil.js" defer></script>
    
    <main>

        <?php
        if (isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo "<div class='msg'>". $msg ."</div>";
        }?>
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-image">
                    <img src="<?=$usuarioLogado['path_img']?>" alt="Foto">
                </div>
                <div class="profile-info">
                    <div class="profile-name"><?=$usuarioLogado['nome']?></div>
                    <div class="profile-bio">Confirme ou edite seus dados cadastrais.</div>
                </div>
            </div>
            <div class="profile-body">
                <div class="profile-row">
                    <i class="fa-solid fa-user"></i>
                    <h2>Minha Conta</h2>
                </div>
                <div class="profiles">
                    <!-- --- dados --- -->
                    <div class="profile-dados">
                        <div class="profile-row">
                            <i class="fa-solid fa-server"></i>
                            <h3>Dados Cadastrais</h3>
                        </div>
                        <form class="dados" method="POST" action="../../actions/usuario/editUsuario.php">
                            <input type="hidden" name="user" value="<?=$usuarioLogado['email']?>">
                            <div class="profile-row">
                                <p class="title-dados">Nome:</p>
                                <input class="title-resp" name="nome" type="text" value="<?=$usuarioLogado['nome']?>">
                            </div>
                            <div class="profile-row">
                                <p class="title-dados">Email:</p>
                                <input class="title-resp" name="email" type="text" value="<?=$usuarioLogado['email']?>">
                            </div>
                            <div class="profile-row">
                                <p class="title-dados">Foto:</p>
                                <input class="title-resp" name="img" type="file" accept="image/">
                            </div>
                            <!-- <div class="profile-row">
                                <p class="title-dados">Celular:</p>
                                <p class="title-resp"  id="celular">(77) 99999-0000</p>
                            </div> -->
                            <div class="profile-buttons">
                                <button type="submit" class="btn-save"><i class="fa-solid fa-pen-to-square"></i>Salvar Alterações</button>
                            </div>
                        </form>
                        <div class="profile-buttons">
                            <button class="btn-save"><i class="fas fa-key"></i> Alterar Senha</button>
                        </div>
                    </div>
                    <!-- --- dados --- -->
                    <div class="profile-tipo">
                        <div class="profile-row">
                            <i class="fa-solid fa-users"></i>
                            <h3>Tipo de Cadastro</h3>
                        </div>
                        <div class="dados">
                            <div class="profile-row">
                                <p class="title-dados">Tipo de cadastro:</p>
                                <p class="title-resp"  id="tipo">Aluno</p>
                            </div>
                        </div>
                        <!-- <div class="profile-buttons">
                            <button class="btn-save"><i class="fa-solid fa-pen-to-square"></i>Alterar dados</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
require_once("../base/footer.php");
?>