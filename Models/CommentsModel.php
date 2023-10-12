<?php

namespace App\Models;

/**
 * Modèle pour la table "comments"
 */
class CommentsModel extends Model
{
    protected $id;
    protected $content;
    protected $date;
    protected $users_id;
    protected $articles_id;

    public function __construct()
    {
        $this->table = 'comments';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUsers_id()
    {
        return $this->users_id;
    }

    public function setUsers_id($value)
    {
        $this->users_id = $value;
        return $this;
    }

    public function getArticles_id()
    {
        return $this->articles_id;
    }

    public function setArticles_id($value)
    {
        $this->articles_id = $value;
        return $this;
    }
    public function commentsCountByArticle($idArticle)
    {
     return $this->requete('SELECT COUNT(id) AS commentsNb FROM comments GROUP BY articles_id')->fetch();
    }
}
