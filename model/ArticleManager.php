<?php 

class ArticleManager extends Manager
{


    public function new_article(string $title, string $content): void 
    {
        $stm = $this->db->prepare("INSERT INTO article(titre, contenu) VALUES(:title, :content)");
        $stm->bindParam(":title", $title);
        $stm->bindParam(":content", $content);
        $stm->execute();
    }

    public function read(): array
    {
        $stm = $this->db->prepare('SELECT * from article');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles; 
    }

    public function readReverse(): array
    {
        $stm = $this->db->prepare('SELECT * from article ORDER BY id DESC');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles; 
    }

    public function paging($limit,$offset): array
    {
        $stm = $this->db->prepare('SELECT * FROM article ORDER BY id DESC LIMIT :limit OFFSET :offset');
        $stm->bindParam(":offset", $offset,PDO::PARAM_INT);
        $stm->bindParam(":limit", $limit,PDO::PARAM_INT);
        $stm->execute();
        $ArticlesPaging = $stm->fetchAll();
        return $ArticlesPaging; 
    }

    public function countArticles()
    {   
        $stm = $this->db->prepare('SELECT count(*) from article');
        $stm->execute();
        $count = $stm->fetch();
        return $count; 

    }

    public function round($numberArticlesPerPage): int
    {
        $count = $this->countArticles();
        $numberArtPerPage = $numberArticlesPerPage;
        return ceil($count[0]/$numberArtPerPage); 
    }


    public function modify($titre, $contenu, $id): void
    {   
        $stm = $this->db->prepare("UPDATE article SET titre= :title, contenu= :content WHERE id= :id");
        $stm->bindParam(":title", $titre);
        $stm->bindParam(":content", $contenu);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

}