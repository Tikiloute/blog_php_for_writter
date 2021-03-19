<?php 
require_once('Administrator_Manager.php');

class Administrator_Manager extends Article_Manager
{   
    public $db;

    public function admin()//: ?array
    {
        $req = $this->db->query('SELECT * from administrateur');// requete ne doit pas tout récup (pseudo)
        // $admin = $req->fetch();
        // if($admin === false){
        //     $admin = null;
        // }

        return $req->fetch();
    }
}


?>