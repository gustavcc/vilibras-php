<?php
require_once("../base/cabecalho.php");
?>

<link rel="stylesheet" href="../../../public/css/perfil.css">
<script src="../../../public/js/perfil.js" defer></script>
    
    <main>
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-image">
                    <img src="../../../public/images/user.png" alt="Foto">
                </div>
                <div class="profile-info">
                    <div class="profile-name">Danyele de Oliveira Santana</div>
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
                        <div class="dados">
                            <div class="profile-row">
                                <p class="title-dados">Nome:</p>
                                <p class="title-resp" id="nome">Danyele de Oliveira Santana</p>
                            </div>
                            <div class="profile-row">
                                <p class="title-dados">Sexo:</p>
                                <p class="title-resp"  id="sexo">Feminino</p>
                            </div>
                            <div class="profile-row">
                                <p class="title-dados">Data de nascimento:</p>
                                <p class="title-resp"  id="data">Junho 8, 1985</p>
                            </div>
                            <div class="profile-row">
                                <p class="title-dados">Email:</p>
                                <p class="title-resp"  id="email">Dany@gmail.com</p>
                            </div>
                            <div class="profile-row">
                                <p class="title-dados">Celular:</p>
                                <p class="title-resp"  id="celular">(77) 99999-0000</p>
                            </div>
                        </div>
                        <div class="profile-buttons">
                            <button class="btn-change"><i class="fas fa-key"></i> Alterar Senha</button>
                            <button class="btn-save"><i class="fa-solid fa-pen-to-square"></i>Alterar dados</button>
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
                            <!-- <div class="profile-row">
                                <p class="title-dados">CPF:</p>
                                <p class="title-resp"  id="cpf">111.222.333-44</p>
                            </div> -->
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