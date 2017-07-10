<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>

<main class="container" id="login-page">

    <div class="row">

        <div class="col-md-4">
            <?php
            /**
             * Exibe mensagem caso esteja retornando de um cadastro
             */
            $msg = new Thirday\Messages\MensagemFactory();
            if (isset($_GET['success'])) {
                $msg->exibeMensagem(new \Thirday\Messages\SuccessMessage(), "Cadastro realizado com sucesso. Entre com seu <b>email</b> e <b> senha</b>. ");
            }
            /**
             * Exibe mensagem caso esteja voltando de um erro
             */
            if (isset($_GET['error'])) {
                if($_GET['error']==='senha'){
                $msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), "Senha incorreta. Tente novamente.");                    
                }
                if($_GET['error']==='user'){
                $msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), " Usuário não encontrado.");                    
                }
				if($_GET['error']==='invalidSession'){
					$msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), " Faça login para continuar."); 
                }
            }
            ?> 

            <div class="panel panel-info entrar-drikas">
                <div class="panel-heading">
                    <h3> Já tenho uma conta</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="./?page=session&action=processaLogin<?php echo $next=(isset($_GET['next']) && $_GET['next'] ==='pedido')?'&next=pedido':''?>">
                        <div class="form-group">
                            <label class="control-label" for="email" >Email</label>                   
                            <input type="email" title="Informe o email cadastrado" class="form-control" name="email" value="" required/>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="senha" >Senha</label>                   
                            <input type="password" class="form-control" name="senha" value="" required/>
                            <span class="help-block"></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrar</button>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="#">Esqueci minha senha</a>
                </div>
            </div>
        </div>         
        <div class="col-md-4 col-md-offset-4">
         <?php  if(isset($_GET['error']) && ($_GET['error'] ==='invalidSession')){                   
				$msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), " Ou faça seu cadastro, caso seja sua primeira compra.");    
                }
		  ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3> Minha primeira compra</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="./?page=user&action=cadastro<?php echo $next=(isset($_GET['next']) && $_GET['next'] ==='pedido')?'&next=pedido':''?>">
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
                            <input type="password" class="form-control" name="confirmaSenha" value="" />
                            <span class="help-block"></span>
                        </div>
                        <button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cadastrar</button>
                    </form>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>         

    </div>







</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 

</body>
</html>
<script type="text/javascript">
    $(function () {
        $("#login-page").parent().css("background", 'url(../images/layout/bg_cad.jpg) no-repeat center');

    })
</script>