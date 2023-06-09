<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\ArticlesModel;
use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\CommentsModel;

class ArticlesController extends Controller
{
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
    public function displaycat($id)
    {
        $articleModel = new ArticlesModel;
        $articles = $articleModel->findBy(['categories_id' => $id]);
$categoriesModel=new CategoriesModel;
$categories=$categoriesModel->findAll();
        $userModel = new UsersModel;
        $users = $userModel->findAll();

        $this->render('articles/index', compact('articles', 'users','categories'));
    }



    public function read(int$id)
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
    public function remove($id)
    {
        $articleModel = new ArticlesModel;
        $articleModel->delete($id);
        header('Location: /articles');
    }
}
