<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>

<main class="container">
    <div class="row">
        <header class="header-page">
            <h4 class="bg-primary text-center">Cadastro Drika's</h4>
        </header>
    </div>

    <div class="row cad-user" style="margin-bottom:120px;">
        <form method="POST" action="./?page=user&action=insert" autocomplete="off">
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
                                <input type="email" class="form-control" name="email" value="" />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="senha">Senha</label>                   
                                <input type="password" class="form-control" name="senha" value="" />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="Repita a senha">Repita a senha</label>                   
                                <input type="password" class="form-control" name="senha-confirm" value="" />
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
                                <input type="text" class="form-control" name="name" value="" />
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="name">CPF</label>                   
                                <input type="text" class="form-control" name="cpf" pattern="\d{11}"
                                       title="Digite apenas número" value="" />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="birth">Data de nascimento</label>                   
                                <input type="date" style="width:160px;"  class="form-control text-center" name="birth"
                                       />
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
                                <input type="text" class="form-control" name="logradouro" value="" />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label  class="control-label" for="numero">Número</label>                   
                                <input type="text" style="width:80px; " class="form-control input-sm" name="numero" value="" />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label  class="control-label" for="Bairro">Bairro</label>                   
                                <input type="text" class="form-control" name="bairro" value="" />
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="Estado">Estado</label>     
                                <select name="estado" id="estado" class="form-control">
                                    <option value="" selected>Selecione</option>
                                    <?php foreach ($estados as $estado) : ?>                                    
                                        <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getNome(); ?></option>                                    
                                    <?php endforeach; ?>                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Cidade">Cidade</label>  

                                <select name="cidade" id="cidade" class="form-control" disabled>

                                </select>

                            </div>


                        </div>
                    </div>

                </div>

            </div>



            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>         
    </div>





</main>

<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
<script type="text/javascript"  src="./script/jquery/jquery-ui.min.js"></script>
<script type="text/javascript"  src="./script/cadastro-usuario.js"></script>
</body>
</html>
