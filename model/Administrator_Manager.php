<?php 

class Administrator_Manager extends Manager
{   

    public function admin()
    {
        $stm = $this->db->prepare('SELECT identifiant, password from administrateur');
        $stm->execute();
         
        return $stm->fetch(); 
        
    }
}


?>