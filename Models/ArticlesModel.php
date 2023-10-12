<?php

namespace App\Models;

/**
 * The `class ArticlesModel` is extending the `Model` class, which means that it inherits all the properties and methods of the `Model` class. This allows the `ArticlesModel` class to have access to the database connection and query builder methods provided by the `Model` class.
 * 
 * @class
 * @name ArticlesModel
 * @extends Model
 */
class ArticlesModel extends Model
{
    protected $id;
    protected $title;
    protected $content;
    protected $date;
    protected $users_id;
    protected $categories_id;

    /**
     * The `public function __construct()` is a constructor method that is called when an object of the `ArticlesModel` class is created. It sets the `$table` property of the `ArticlesModel` class to `'articles'`.
     * 
     */
    public function __construct()
    {
        $this->table = 'articles';
    }

    /**
     * The `public function getId(): int` is a getter method that returns the value of the `$id` property of the `ArticlesModel` class, and specifies that the return type of the method is `int`.
     * 
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The `public function setId(int $id): self` is a setter method that sets the value of the `$id` property of the `ArticlesModel` class to the value passed as an argument to the method. The method returns the current object instance (`$this`) to allow for method chaining. The `int` type hint specifies that the argument passed to the method must be an integer. The `self` return type hint specifies that the method returns an instance of the current class (`ArticlesModel`).
     * 
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The `public function getTitle(): string` is a getter method that returns the value of the `$title` property of the `ArticlesModel` class, and specifies that the return type of the method is `string`.
     * 
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * The `public function setTitle(string $title): self` is a setter method that sets the value of the `$title` property of the `ArticlesModel` class to the value passed as an argument to the method. The method returns the current object instance (`$this`) to allow for method chaining. The `string` type hint specifies that the argument passed to the method must be a string. The `self` return type hint specifies that the method returns an instance of the current class (`ArticlesModel`).
     * 
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * The `public function getContent(): string` is a getter method that returns the value of the `$content` property of the `ArticlesModel` class, and specifies that the return type of the method is `string`.
     * 
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * The `public function setContent(string $content): self` is a setter method that sets the value of the `$content` property of the `ArticlesModel` class to the value passed as an argument to the method. The method returns the current object instance (`$this`) to allow for method chaining. The `string` type hint specifies that the argument passed to the method must be a string. The `self` return type hint specifies that the method returns an instance of the current class (`ArticlesModel`).
     * 
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * The `public function getDate()` is a getter method that returns the value of the `$date` property of the `ArticlesModel` class.
     * 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * `public function setDate($date): self` is a setter method that sets the value of the `$date` property of the `ArticlesModel` class to the value passed as an argument to the method. The method returns the current object instance (`$this`) to allow for method chaining. The `self` return type hint specifies that the method returns an instance of the current class (`ArticlesModel`).
     * 
     */
    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * The `public function getCategories_id()` is a getter method that returns the value of the `$categories_id` property of the `ArticlesModel` class.
     * 
     */
    public function getCategories_id()
    {
        return $this->categories_id;
    }

    /**
     * The `public function setCategories_id($value)` is a setter method that sets the value of the `$categories_id` property of the `ArticlesModel` class to the value passed as an argument to the method. It then returns the current object instance (`$this`) to allow for method chaining.
     * 
     */
    public function setCategories_id($value)
    {
        $this->categories_id = $value;
        return $this;
    }

    /**
     * The `public function getUsers_id()` is a getter method that returns the value of the `$users_id` property of the `ArticlesModel` class.
     * 
     */
    public function getUsers_id()
    {
        return $this->users_id;
    }

    /**
     * The `public function setUsers_id($value)` is a setter method that sets the value of the `$users_id` property of the `ArticlesModel` class to the value passed as an argument to the method. It then returns the current object instance (`$this`) to allow for method chaining.
     * 
     */
    public function setUsers_id($value)
    {
        $this->users_id = $value;
        return $this;
    }
}
