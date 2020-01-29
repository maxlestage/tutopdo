<?php


namespace App\Model;


class ArticleManager extends AbstractManager
{
    const TABLE = 'article';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param array $item
     * @return int
     */
    public function insert(array $article): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`title`, `content`, `author`, `date`, `image`) 
            VALUES (:title, :content, :author, :date_article, :image)");
        $statement->bindValue('title', $article['title'], \PDO::PARAM_STR);
        $statement->bindValue('content', $article['content'], \PDO::PARAM_STR);
        $statement->bindValue('author', $article['author'], \PDO::PARAM_STR);
        $statement->bindValue('date_article', $article['date'], \PDO::PARAM_STR);
        $statement->bindValue('image', $article['image'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }


    /**
     * @param array $article
     * @return bool
     */
    public function update(array $article):bool
    {
        // prepared request
        $statement = $this->pdo->prepare(
            "UPDATE $this->table 
            SET 
                `title` = :title,
                `content` = :content,
                `author` = :author,
                `date` = :date_article,
                `image` = :image
            WHERE id=:id"
        );

        $statement->bindValue('id', (int) $article['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $article['title'], \PDO::PARAM_STR);
        $statement->bindValue('content', $article['content'], \PDO::PARAM_STR);
        $statement->bindValue('author', $article['author'], \PDO::PARAM_STR);
        $statement->bindValue('date_article', $article['date'], \PDO::PARAM_STR);
        $statement->bindValue('image', $article['image'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}