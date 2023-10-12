<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\ArticlesModel;
use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\CommentsModel;

/**
 * The `class ArticlesController extends Controller` is defining a new class called `ArticlesController` that extends the `Controller` class. This means that the `ArticlesController` class inherits all the properties and methods of the `Controller` class and can also define its own properties and methods.
 * 
 * @class
 * @name ArticlesController
 * @extends Controller
 */
class ArticlesController extends Controller
{

    /**
     * The `public function index()` is a method that retrieves all articles, users, and categories from their respective models and passes them to the `render()` method to display them on the `articles/index` view.
     * 
     */
    public function index()
    {
        $articleModel = new ArticlesModel;
        $articles = $articleModel->findAll();

        $userModel = new UsersModel;
        $users = $userModel->findAll();
        $categoriesModel = new CategoriesModel;
        $categories = $categoriesModel->findAll();



        $this->render('articles/index', [
            'articles' => $articles,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * `public function displaycat($id)` is a method that retrieves all articles with a specific category ID, all users, and all categories from their respective models and passes them to the `render()` method to display them on the `articles/index` view. The category ID is passed as a parameter to the method.
     * 
     */
    public function displaycat($id)
    {
        $articleModel = new ArticlesModel;
        $articles = $articleModel->findBy(['categories_id' => $id]);
        $categoriesModel = new CategoriesModel;
        $categories = $categoriesModel->findAll();
        $userModel = new UsersModel;
        $users = $userModel->findAll();

        $this->render('articles/index', compact('articles', 'users', 'categories'));
    }

    /**
     * The `public function read(int $id)` method is retrieving a specific article with the given `$id` parameter from the `ArticlesModel`, as well as its associated category, user, and comments. It then passes these data to the `render()` method to display them on the `articles/read` view.
     * 
     */
    public function read(int $id)
    {

        $articleModel = new ArticlesModel;
        $article = $articleModel->find($id);

        $categoriesModel = new CategoriesModel;
        $categorie = $categoriesModel->find($article['categories_id']);

        $usersModel = new UsersModel;
        $user = $usersModel->find($article['users_id']);
        $commentsModel = new CommentsModel;
        $comments = $commentsModel->findBy(['articles_id' => $id]);

        $this->render('articles/read', compact('article', 'categorie', 'user', 'comments'));
    }

    /**
     * The `public function add()` method is adding a new article to the database. It first checks if the form data submitted by the user is valid and if the user is logged in. If the data is valid and the user is logged in, it creates a new `ArticlesModel` object, sets its properties with the form data and the user ID, and calls the `create()` method to insert the new article into the database. Finally, it redirects the user to the `articles` page. If the form data is not valid or the user is not logged in, it simply renders the `articles/add` view with the list of categories.
     * 
     */
    public function add()
    {

        if ($this->validate($_POST, ['titre', 'contenu', 'categorie']) && isset($_SESSION['user_id'])) {

            $article = new ArticlesModel;
            $article->setTitle($_POST['titre'])
                ->setContent($_POST['contenu'])
                ->setCategories_id($_POST['categorie'])
                ->setUsers_id($_SESSION['user_id']);

            $article->create();

            header('Location: /articles');
        }



        $categoriesModel = new CategoriesModel;
        $categories = $categoriesModel->findAll();
        $this->render(
            'articles/add',
            compact('categories')
        );
    }

    /**
     * The `public function edit($id)` method is retrieving a specific article with the given `$id` parameter from the `ArticlesModel`. It then checks if the form data submitted by the user is valid and if the user is logged in. If the data is valid and the user is logged in, it updates the article with the new data and redirects the user to the `articles` page. If the form data is not valid or the user is not logged in, it simply renders the `articles/edit` view.
     * 
     */
    public function edit($id)
    {
        // On instancie le modèle
        $articleModel = new ArticlesModel;

        // On récupère les données
        $article = $articleModel->find($id);

        if ($this->validate($_POST, ['title', 'content', 'category']) && isset($_SESSION['user_id'])) {
            $articleUp = new ArticlesModel;
            $articleUp->setId($article['id'])
                ->setTitle($_POST['title'])
                ->setContent($_POST['content'])
                ->setCategories_id($_POST['category'])
                ->setUsers_id($_SESSION['user_id']);
            $articleUp->update();

            header('Location: /articles');
        }


        $categoriesModel = new CategoriesModel;
        $categories = $categoriesModel->findAll();

        $this->render('articles/edit', compact('article', 'categories'));
    }

    /**
     * The `public function remove($id)` method is deleting a specific article with the given `$id` parameter from the `ArticlesModel`. It then redirects the user to the `articles` page.
     * 
     */
    public function remove($id)
    {
        $articleModel = new ArticlesModel;
        $articleModel->delete($id);
        header('Location: /articles');
    }
}
