<?php 

require_once('Article_manager.php');

class Comment_Manager extends Article_Manager
{   

    public function newCommentary($id, $comment, $idArticle)
    {
        if (empty($id) || empty($comment) ) 
        { 
            echo "il manque votre pseudo et / ou le contenu du commentaire";
            return;
        }
        $this->db->exec("INSERT INTO commentaire(identifiant, commentaire, idArticle, date) VALUES('$id', '$comment', '$idArticle', NOW())");
    }

    public function read(): array
    {
        $comments = $this->db->query('SELECT * from commentaire INNER JOIN article a ON idArticle = a.id');
        return $comments->fetchAll();  
    }

    public function date() : array
    {
        $date = $this->db->query('SELECT DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, HOUR(date) AS heure, MINUTE(date) AS minute, SECOND(date) AS seconde from commentaire');
        return $date->fetch();
    }



}



?>