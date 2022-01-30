<?php

require_once(__DIR__."/../../config/DatabaseConnection.php");


class ArticlesModel extends DatabaseConnection {

    public function GetAllArticles() : array {

        $query = 'SELECT * FROM articles ORDER BY id ASC';
        $result = $this->connection->query($query);

        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function GetArticleById($id) : array {

        $stmt = $this->connection->prepare('SELECT * FROM articles WHERE id = ?');
    
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $fetchedRow = $result->fetch_assoc();

        return $fetchedRow ?? [];
    }

    public function InsertNewArticle($name, $text) : bool {

        if($name == '')
            return false;
        try {
            $stmt = $this->connection->prepare('INSERT INTO articles (name, article) VALUES (?, ?)');
            $stmt->bind_param("ss", $name, $text);
            $stmt->execute();
        }
        catch(mysqli_sql_exception $e){
            return false;
        }
        return true;
    }

    public function UpdateArticle($id, $newName, $newText) {

        $stmt = $this->connection->prepare('UPDATE articles SET name = ?, article = ? WHERE id = ? ');
        $stmt->bind_param("ssi", $newName, $newText, $id);
        $stmt->execute();

    }

    public function GetLastInsertedArticle() : array
    {
        $query = 'SELECT * FROM articles ORDER BY id DESC LIMIT 1';
        $result = $this->connection->query($query);

        return $result ? $result->fetch_assoc() : [];
    }


    public function DeleteArticle($id) {
        
        if (!is_numeric($id))
            return;

        $stmt = $this->connection->prepare('DELETE FROM articles WHERE id = ?');
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

}