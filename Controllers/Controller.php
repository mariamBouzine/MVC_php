<?php 
    abstract class Controller{
        
        public function __construct(string $model)
        {
            include_once ROOT.'Models/'.$model.'.php';
        }
        public function view(string $fichier, $data = null)
        {
            include_once ROOT."views/".get_class($this)."/$fichier.php";
        }
        public function Redirect($chemin){
            header('Location:'.$chemin);
        }
    }
?>