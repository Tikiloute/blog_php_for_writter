<?php 


class CommentManager extends Manager
{   

    public function newCommentary($id, $comment, $idArticle): void
    {

        $stm = $this->db->prepare("INSERT INTO commentaire(identifiant, commentaire, idArticle, date) VALUES(:id, :comment, :idArticle, NOW())");
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();
        header('location: index.php?action=reading&read='.$_GET["read"]);

    }

    public function read(): array
    {

        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, idArticle, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date  from commentaire');
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
  
    }

    public function newCommentaryWarning($id, $comment, $idComment, $date): void
    {

        $stm = $this->db->prepare("INSERT INTO commentaire_moderation(identifiant, commentaire, idCommentaire, date) VALUES( :id, :comment, :idComment, :dateComment)");
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idComment", $idComment);
        $stm->bindParam(":dateComment", $date);
        $stm->execute();

    }

    public function readWarning(): array
    {

        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, idCommentaire, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date from commentaire_moderation');
        $stm->execute();
        $commentsWarning = $stm->fetchAll();
        return $commentsWarning; 
 
    }

    public function deleteComment($idWarningComment): void
    {

        $stm = $this->db->prepare("DELETE FROM commentaire WHERE id = :id");
        $stm->bindParam(":id", $idWarningComment);
        $stm->execute();

    }

    public function deleteCommentWarning($idWarningComment): void
    {

        $stm = $this->db->prepare("DELETE FROM commentaire_moderation WHERE idCommentaire = :id");
        $stm->bindParam(":id", $idWarningComment);
        $stm->execute();

    }

}

?>