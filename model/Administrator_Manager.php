<?php 

class Administrator_Manager extends Manager
{   

    public function admin()
    {
        $req = $this->db->query('SELECT identifiant, password from administrateur');
        

        return $req->fetch();
    }
}


?>