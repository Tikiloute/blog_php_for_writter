<?php 

class Article_Manager extends Manager
{


    public function new_article(string $title, string $content): void 
    {
        if (empty($title) or empty($content)) 
        { 
            echo "il manque le titre et / ou le contenu";
            return;
        }
        $this->db->exec("INSERT INTO article(titre, contenu) VALUES('$title', '$content')");
    }

    public function read()
    {
        $stm = $this->db->prepare('SELECT * from article');
        $stm->execute();
        $articles = $stm->fetchAll();
        return $articles;
        // $articles = $this->db->query('SELECT * from article');
        // return $articles->fetchAll();  
    }

    public function modify($titre, $contenu, $id)
    {   
       // $this->db->exec("UPDATE article SET titre='$titre', contenu='$contenu' WHERE id='$id'");
        $stm = $this->db->prepare("UPDATE article SET titre=?, contenu=? WHERE id=?");
        $stm->bind_param('ssi', $titre, $contenu, $id);
        $stm->execute();
    }



}