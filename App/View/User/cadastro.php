<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>

<?php
/**
 * Identifica se veio da página de login, captura os dados e exibe a mensagem
 */
$msg = new Thirday\Messages\MensagemFactory();
if (isset($_POST['email'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
    $confirmaSenha = filter_input(INPUT_POST, 'confirmaSenha', FILTER_DEFAULT);    
    
    $msg->exibeMensagem(new \Thirday\Messages\AlertMessage(), "Preencha o formulário para completarmos seu cadastro."
    );
}
if(isset($_GET['error'])){
     $msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), "Verifique os dados do formulário, aparentemente algum campo obrigatório não estava corretamente preenchido."
             );
}

?>


<main class="container">
    <div class="row">
        <header class="header-page">
            <h4 class="bg-primary text-center">Cadastro Drika's</h4>
        </header>
    </div>

    <div class="row cad-user" style="margin-bottom:120px;">
        <form method="POST" action="./?page=user&action=insert<?php echo $next=(isset($_GET['next']) && $_GET['next'] ==='pedido')?'&next=pedido':''?>" autocomplete="off">
            <div class="row">

                <!--PAINEL Usuário-->
                <div class="col-xs-12 col-md-5 col-lg-4">
                    <div class="panel panel-default"><!--Dados Básicos-->
                        <div class="panel-heading">
                            <h2 class="panel-title">Conta</h2>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>                   
                                <input type="email" class="form-control" name="email" value="<?php echo $email = (isset($email)) ? $email : "" ?>" required />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone">Telefone</label>                   
                                <input type="tel" class="form-control" id="phone" name="phone" value="" required/>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="senha">Senha</label>                   
                                <input type="password" class="form-control" name="senha" value="<?php echo $senha = (isset($senha)) ? $senha : "" ?>" required />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="Repita a senha">Repita a senha</label>                   
                                <input type="password" class="form-control" name="confirmaSenha" value="<?php echo $confirmaSenha = (isset($confirmaSenha)) ? $confirmaSenha : "" ?>" required/>
                                <span class="help-block"></span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-md-5 col-lg-4">

                    <div class="panel panel-default"><!--Dados Básicos-->
                        <div class="panel-heading">
                            <h2 class="panel-title">Básico</h2>
                        </div>
                        <div class="panel-body">                           

                            <div class="form-group" style="margin-bottom: 12px;">
                                <label for="sexo">Sexo </label>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input type="radio" name="sexo" value="F" autocomplete="F">Feminino
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="sexo" value="M" autocomplete="M">Masculino
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name">Nome </label>                   
                                <input type="text" class="form-control" name="name" value=""required />
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="name">CPF</label>                   
                                <input type="text" class="form-control" name="cpf" 
                                       title="Digite apenas número" value="" required/>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="birth">Data de nascimento</label>                   
                                <input type="date" style="width:160px;"  class="form-control text-center" name="birth"
                                      required />
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>





                <!--PAINEL ENDEREÇO-->
                <div class="col-xs-12 col-md-5 col-lg-4">
                    <div class="panel panel-default"><!--Dados Básicos-->
                        <div class="panel-heading">
                            <h2 class="panel-title">Endereço</h2>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label  class="control-label" for="Logradouro">Logradouro</label>                   
                                <input type="text" class="form-control" name="logradouro" value="" required />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label  class="control-label" for="numero">Número</label>                   
                                <input type="text" style="width:80px; " class="form-control input-sm" name="numero" value="" required />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label  class="control-label" for="Bairro">Bairro</label>                   
                                <input type="text" class="form-control" name="bairro" value="" required/>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="Estado">Estado</label>     
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="" selected>Selecione</option>
                                    <?php foreach ($estados as $estado) : ?>                                    
                                        <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getNome(); ?></option>                                    
                                    <?php endforeach; ?>                                    
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="Cidade">Cidade</label>  

                                <select name="cidade" id="cidade" class="form-control" required disabled>

                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label  class="control-label" for="cep">CEP</label>
                                <input type="text" class="form-control" name="cep" value="" required/>
                                <span class="help-block"></span>
                            </div>


                        </div>
                    </div>

                </div>

            </div>



            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cadastrar</button>
                </div>
            </div>
        </form>         
    </div>





</main>

<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
<script type="text/javascript"  src="./script/jquery/jquery-ui.min.js"></script>
<script type="text/javascript"  src="./script/cadastro-usuario.js"></script>
<script type="text/javascript"  src="./script/plugins/jquery.mask.min.js"></script>
</body>
</html>
