<?php 


class CommentManager extends Manager
{   

    const LIMIT = 4;

    public function newCommentary($id, $comment, $idArticle): void
    {

        $stm = $this->db->prepare('INSERT INTO commentaire(identifiant, commentaire, idArticle, date) VALUES(:id, :comment, :idArticle, NOW())');
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();        
    }

    public function read(): array
    {
        $stm = $this->db->prepare('SELECT c.id, c.identifiant, c.commentaire, c.idArticle, a.id, a.titre ,DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date from commentaire c INNER JOIN article a ON c.idArticle = a.id');
        $stm->execute();
        $comments = $stm->fetchAll();
        return $comments; 
    }

    public function newCommentaryWarning($id, $comment, $idComment, $date, $nomArticle, $idArticle): void
    {
        $stm = $this->db->prepare('INSERT INTO commentaire_moderation(identifiant, commentaire, idCommentaire, date, NomArticle, idArticle) VALUES( :id, :comment, :idComment, :dateComment, :nomArticle, :idArticle)');
        $stm->bindParam(":id", $id);
        $stm->bindParam(":comment", $comment);
        $stm->bindParam(":idComment", $idComment);
        $stm->bindParam(":dateComment", $date);
        $stm->bindParam(":nomArticle", $nomArticle);
        $stm->bindParam(":idArticle", $idArticle);
        $stm->execute();
    }

    public function readWarning(): array
    {
        $stm = $this->db->prepare('SELECT id, identifiant, commentaire, idCommentaire, date, NomArticle, idArticle from commentaire_moderation');
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
        $stm = $this->db->prepare("DELETE FROM commentaire_moderation WHERE id = :id");
        $stm->bindParam(":id", $idWarningComment);
        $stm->execute();
    }

    public function paging($limit,$offset,$read): array
    {
        $stm = $this->db->prepare('SELECT c.id, c.identifiant, c.commentaire, c.idArticle, a.id, a.titre , DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date FROM commentaire c INNER JOIN article a ON c.idArticle = a.id WHERE idArticle = :numberArticle ORDER BY idArticle DESC LIMIT :limit OFFSET :offset');
        $stm->bindParam(":offset", $offset,PDO::PARAM_INT);
        $stm->bindParam(":limit", $limit,PDO::PARAM_INT);
        $stm->bindParam(":numberArticle", $read ,PDO::PARAM_INT);
        $stm->execute();
        $commentsPaging = $stm->fetchAll();
        return $commentsPaging; 
    }

    public function countComment($read)
    {   
        $stm = $this->db->prepare('SELECT count(idArticle) FROM commentaire WHERE idArticle = :numberArticle');
        $stm->bindParam(":numberArticle", $read);
        $stm->execute();
        $count = $stm->fetch();
        return $count; 
    }

    public function round($numberCommentsPerPage, $read): int
    {
        $count = $this->countComment($read);
        $numberComPerPage = $numberCommentsPerPage;
        return ceil($count[0]/$numberComPerPage); 
    }

    public function selectComment($id)
    {
        $stm = $this->db->prepare("SELECT c.id, c.identifiant, c.commentaire, c.date, c.idArticle, a.id FROM commentaire c INNER JOIN article a ON c.idArticle = a.id WHERE a.id= :id");
        $stm->bindParam(":id", $id);
        $stm->execute();
        $ArticlesSelect = $stm->fetchAll();
        return $ArticlesSelect; 

    }

}

?>