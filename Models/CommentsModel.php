<?php

namespace App\Models;

/**
 * Modèle pour la table "annonces"
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
    /** on utilise des setteures et des getteurs parce que on met les atrributs en protected
     * donc on ne peux l'acceder que par le bies des setteurs et getteurs
     */
    /**
     * Obtenir la valeur de id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Obtenir la valeur de content
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Définir la valeur de content
     *
     * @return  self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Obtenir la valeur de date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Définir la valeur de date
     *
     * @return  self
     */
    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }


    /**
     * Obtenir la valeur de users_id
     */

    public function getUsers_id()
    {
        return $this->users_id;
    }
    /**
     * Définir la valeur de users_id
     */

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
