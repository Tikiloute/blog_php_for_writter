<?php 
// ici nous mettrons les infos de la base de données


class Article {
    public $db;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', ''); 
        } catch(PDOException $e) {
            print "erreur".$e->getMessage();
            die();
        }
    }

    public function new_article($title, $content){
        if (empty($title) or empty($content)) { 
            echo "il manque le titre et / ou le contenu";
            return;
        }
        $this->db->exec("INSERT INTO article(titre, contenu) VALUES('$title', '$content')");

    }

    public function read(){
        $articles = $this->db->query('SELECT * from article');
        return $articles->fetchAll();  
    }

    public function admin(){
        $admin = $this->db->query('SELECT * from administrateur');
        return $admin->fetch();
    }
}