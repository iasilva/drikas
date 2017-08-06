<?php
/**
 * User: Ivan Alves da Silva
 * Date: 12/07/2017
 * Time: 20:32
 */
include_once HTML_DIR . DS . 'head.php';
include_once HTML_DIR . DS . 'header.php';
?>
<main class="container">


    <!--Exibição de endereço para confirmação-->
    <div class="row">
        <header><em><?php echo $h1 ?></em></header>

        <div class="col-md-5 col-md-offset-1" id="payment-method">
            <header>
                <h2>Método de pagamento</h2>
                <p>Todas as transações são seguras e encriptadas.</p>
            </header>

            <div class="row">
                <form method="post" action="./?page=pedido&action=processPayment">
                    <input type="hidden" name="order-id" value="<?php echo $orderId ?>">
                <header class="col-xs-12" id="heading-payment-method-choose">
                    <div class="col-xs-5">
                        <div class="radio">
                            <label>
                                <input type="radio" name="payment-method" id="boleto" value="boleto">
                                Boleto bancário
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="payment-method" id="cartao" value="cartao">
                                Cartão de crédito
                            </label>
                        </div>
                    </div>
                </header>

                    <article class="col-xs-12" id="credit-card">
                        <div class="alert alert-danger" id="alert-card">
                            <strong>Atenção!</strong> Todos os campos são de preenchimento obrigatório.
                        </div>

                        <!--Inserção das bandeiras de cartão-->
                        <div class="col-xs-12" id="bandeirasDisponíveis">


                            <div class="col-xs-4 col-sm-3 individual-brand">
                                <div class="col-xs-12 img-brand">
                                    <label>
                                        <div class="col-xs-12 img-brand">
                                            <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/visa.png" alt="">
                                        </div>
                                        <div class="col-xs-12 radio-select-brand">
                                            <div class="checkbox">
                                                <input type="radio" name="cardType" value="VISA"><span class="nameOfBrand"> Visa</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-3 individual-brand">
                                <div class="col-xs-12 img-brand">
                                    <label>
                                        <div class="col-xs-12 img-brand">
                                            <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/mastercard.png" alt="">
                                        </div>
                                        <div class="col-xs-12 radio-select-brand">
                                            <div class="checkbox">
                                                <input type="radio" name="cardType" value="MASTERCARD"><span class="nameOfBrand">Master</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-3 individual-brand">
                                <div class="col-xs-12 img-brand">
                                    <label>
                                        <div class="col-xs-12 img-brand">
                                            <img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/elo.png" alt="">
                                        </div>
                                        <div class="col-xs-12 radio-select-brand">
                                            <div class="checkbox">
                                                <input type="radio" name="cardType" value="ELO"><span class="nameOfBrand">ELO</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>


                        </div>
                        <!--Fim da inserção das bandeiras-->


                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-number">Número do cartão</label>
                                <input type="text" name="card-number" class="form-control" id="card-number"
                                       title="Digite o número do seu cartão de crédito">
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="cardholder">Titular <em>(Idêntico ao cartão.)</em></label>
                                <input type="text" name="card-holder" class="form-control" id="card-holder"
                                       title="Escreva idêntico ao nome no cartão">

                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" name="cvv" class="form-control" id="cvv"
                                       title="Escreva o código de segurança">
                            </div>
                        </div>

                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="cpf">CPF do titular</label>
                                <input type="text" name="cpf" class="form-control" id="cpf"
                                       title="Digite seu CPF">

                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="validade">Validade</label>
                                <input type="text" name="card-validade" class="form-control" id="card-validade"
                                       title="Digite a validade do seu cartão" placeholder="MM/AAAA">

                            </div>
                        </div>

                        <article class="row"> <!--Dados referente ao endereço do titular do cartão de crédito-->

                            <header>
                                <div id="endereco-card" class="text-primary">
                                    <div class="col-xs-5">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="new-endereco" id="new-endereco-true"
                                                       value="true" checked>
                                                Endereço diferente
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="new-endereco" id="new-endereco-false"
                                                       value="false">
                                                Mesmo endereço do cadastro
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </header>


                            <div class="col-xs-12" id="new-endereco-card"> <!--Novo endereço para o cartão de crédito-->
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="logradouro-card">Logradouro</label>
                                        <input type="text" name="logradouro-card" class="form-control"
                                               id="logradouro-card"
                                               title="Digite o logradouro/Rua do Titular do cartão">
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <div class="form-group">
                                        <label for="bairro-card">Bairro</label>
                                        <input type="text" name="bairro-card" class="form-control" id="bairro-card"
                                               title="Digite o Bairro do bairro do titular do cartão">
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="num-endereco-card">Número</label>
                                        <input type="text" name="num-endereco-card" class="form-control"
                                               id="num-endereco-card"
                                               title="Digite o número da casa do titular">
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label for="cidade-card">Cidade</label>
                                        <input type="text" name="cidade-card" class="form-control"
                                               id="cidade-card"
                                               title="Digite a cidade da casa do titular">
                                    </div>
                                </div>
                                <div class="col-xs-5">
                                    <div class="form-group">
                                        <label for="estado-card">Estado</label>
                                        <select name="estado" id="estado" class="form-control">
                                            <option value="" selected>Selecione</option>
                                            <?php foreach ($estados as $estado) : ?>
                                                <option value="<?php echo $estado->getUf(); ?>"><?php echo $estado->getNome(); ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xs-7 col-md-4 col-xs-offset-5 col-md-offset-8">
                                    <div class="form-group">
                                        <label for="cep-card">CEP</label>
                                        <input type="text" name="cep-card" class="form-control"
                                               id="cep-card"
                                               title="Digite o CEP da casa do titular">
                                    </div>
                                </div>
                            </div><!-- FIM! Novo endereço para o cartão de crédito-->

                        </article><!-- FIM! Dados referente ao endereço do titular do cartão de crédito-->

                    </article>
                    <section id="card-submit" class="row">
                        <div class="col-xs-7 col-md-4 col-xs-offset-1">
                            <button type="submit" id="form-payment-submit" class="btn btn-primary btn-lg">Pagar pedido</button>
                        </div>
                    </section>

                </form>
            </div><!--Fim do row externo ao Panel-->
        </div> <!--Fim do col-md-5-->

        <div class="col-md-5 col-md-offset-1"> <!-- Informações do endereço para envio-->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Endereço para envio
                            <!--<button class="btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>--> </h4>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Logradouro:</th>
                                <td><?php echo $user->getLogradouro() . " Nº: " . $user->getNumero() ?></td>
                            </tr>
                            <tr>
                                <th>Bairro:</th>
                                <td><?php echo $user->getBairro() ?></td>
                            </tr>
                            <tr>
                                <th>Cidade / Estado:</th>
                                <td><?php echo $municipio->getNome() . ' / ' . $estado->getNome() ?></td>
                            </tr>
                            <tr>
                                <th>CEP:</th>
                                <td><?php echo $user->getCep() ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <p><strong>Valor total do pedido:</strong> <span
                            class="label label-info"><?php echo 'R$ ' . number_format($cart, 2, ',', '.') ?></span>
                </p>
            </div>

        </div>

    </div>

</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
<script type="text/javascript" src="./script/pedido.js"></script>

<!--API Javascript-->
<script type="text/javascript"
        src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
    /* Produção-> "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">*/
</script>
<script type="text/javascript">
    PagSeguroDirectPayment.setSessionId('01f5be749b6c4c1faf37958ea0814611');
</script>
<script type="text/javascript" src="./script/pagseguro.js"></script>
<script type="text/javascript" src="./script/plugins/jquery.mask.min.js"></script>
</body>
</html>
