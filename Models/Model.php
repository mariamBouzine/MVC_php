<?php
abstract class Model
{
    public $id = 0;
    private static $pdo = null;
    public function __construct()
    {
        $chemin = substr($_SERVER['SCRIPT_FILENAME'], 0, -9);
        $fichier = file($chemin . ".env");
        $server = trim(explode('=', $fichier[1])[1]);
        $dbname = trim(explode('=', $fichier[3])[1]);
        $user = trim(explode('=', $fichier[4])[1]);
        $password = trim(explode('=', $fichier[5])[1]);
        self::$pdo = new PDO('mysql:host=' . $server . ';dbname=' . $dbname, $user, $password);
    }
    public function save()
    {
        $data = (array) $this; 
        $req = "";
        if ($this->id == 0) {
            unset($data['ID']);
            $fields = $values = "";
            $req = "insert into " . get_class($this) . "(";
            foreach ($data as $key => $value) {
                if ($key != "id") {
                    $fields .= $key . ',';
                    $values .= "'" . $value . "',";
                }
            } 
            $fields = substr($fields, 0, -1);
            $values = substr($values, 0, -1);
            $req .= $fields . ') values(' . $values . ')';
        } else {
            $req = "update " . get_class($this) . " set ";
            foreach ($data as $key => $value) 
                if ($key != "id")
                    $req .= $key . "='" . $value . "',";
            $req = substr($req, 0, -1);
            $req .= " where id=".$this->id;
        } 
        
        self::$pdo->exec($req);
    }
    public function delete()
    {
        $req = "DELETE FROM " . get_class($this) . " where id =".$this->id;
        self::$pdo->exec($req);
    }
    public static function find($id)
    {
        $classe = get_called_class();
        $req = "SELECT * FROM $classe where id =".$id;
        //echo $req;
        $o=new $classe();
        $res=self::$pdo->query($req);
        $stm = $res->fetch(PDO::FETCH_ASSOC);
        foreach ($stm as $key => $value)
            $o->$key=$value;
            return $o;
    }
    public static function All()
    {
        $classe = get_called_class();
        $req = "SELECT * FROM $classe ";
        new $classe();
        $res=self::$pdo->query($req);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}
