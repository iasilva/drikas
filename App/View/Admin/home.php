
<?php include_once HTML_DIR.DS.'admin-head.php'; ?>
<?php include_once HTML_DIR.DS.'admin-header.php'; ?>
<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1> Bem vindo <span style="opacity: .5;"><?php echo $user =(isset($_SESSION['user']))?$_SESSION['user']['name']:''; ?></span>  <span class="glyphicon glyphicon-home" style="font-size: 16px; opacity: .5;"></span> </h1>
            </div>
        </div>
    </div>

</div>

<main class="container">

    
    
    
</main>
<?php require_once HTML_DIR.DS.'admin-footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
