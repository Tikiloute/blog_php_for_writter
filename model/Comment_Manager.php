<?php 



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
        header('location: index.php?read='.$_GET["read"]);
    }

    public function read(): array
    {
        $comments = $this->db->query('SELECT * from commentaire INNER JOIN article a ON idArticle = a.id');
        return $comments->fetchAll();  
    }


    public function newCommentaryWarning($id, $comment, $idComment, $date)
    {
        $this->db->exec("INSERT INTO commentaire_moderation(identifiant, commentaire, idCommentaire, date) VALUES('$id', '$comment', '$idComment', '$date')");
        //header('location: index.php?read='.$_GET["read"]);
    }

    public function readWarning(): array
    {
        $commentsWarning = $this->db->query('SELECT * from commentaire_moderation INNER JOIN commentaire c ON idCommentaire = c.id');
        return $commentsWarning->fetchAll();  
    }

}



?>