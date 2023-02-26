<?php
$chemin = substr($_SERVER['SCRIPT_FILENAME'], 0, -9);
define("ROOT", $chemin);
//echo $_SERVER['SCRIPT_FILENAME'];
include_once ROOT . 'Models/Model.php';
include_once ROOT . 'Controllers/Controller.php';
include_once ROOT.'Views/public/header.php';
$url = $_GET['url'];
// echo $url;
$id = 0;
$infos_url = explode("/", $url);
if ($infos_url[0] != "") {
    if (file_exists(ROOT . 'Controllers/' . $infos_url[0] . ".php")) {

        include_once ROOT . 'Controllers/' . $infos_url[0] . ".php";
        $controlleur = new $infos_url[0]();
        $action = "index";
        if (isset($infos_url[1])) 
            $action = $infos_url[1];
        if (method_exists($controlleur, $action)){
            $request = null;
            if (isset($infos_url[2])){
                $id = $infos_url[2];
            }       
            if (!empty($_POST)) {
                
                $request = new stdClass();
                foreach ($_POST as $key => $value) {
                    $request->$key = $value;
                }
            }
            if ($request != null) {
                if ($id != 0) {
                    $controlleur->$action($id, $request);
                } else {
                    $controlleur->$action($request);
                }
            } else {
                if ($id == 0) {
                    $controlleur->$action();
                } else {
                    $controlleur->$action($id);
                }
            }
        }
        else{
            echo "url introuvable !!!!!!!!!!!!!!!!!!";
        }
    } else {
        echo "url introuvable !!!";
    }
}
else{
    echo"<center>
        <h2><a href='Profs'>Gestion des profs</a></h2>
        <h2><a href='Etudiants'>Gestion des Etudiants</a></h2>
    </center>";
}
include_once ROOT . 'Views/public/footer.php';
