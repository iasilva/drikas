<?php
require './vendor/autoload.php';
if(isset($_FILES['foo'])){
$storage = new \Upload\Storage\FileSystem('./teste/');
$file = new \Upload\File('foo', $storage);
$file->setName(uniqid());
$file->addValidations(array(        
        new \Upload\Validation\Mimetype(array('image/png','image/jpeg')),
        new \Upload\Validation\Size('500K')
    ));
   
    try {
        $file->upload();        
    } catch (Exception $exc) {         
         $msg=new \Thirday\Messages\MensagemFactory();
         $msg->exibeMensagem(new \Thirday\Messages\ErrorMessage, $file->getErrors()[0]);
    }
}

?>



<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="foo" value=""/>
    <input type="submit" value="Upload File"/>
</form>