<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\CommentsModel;

/**
 * The `class CommentsController extends Controller` is defining a new class called `CommentsController` that extends the `Controller` class. This means that the `CommentsController` class inherits all the properties and methods of the `Controller` class and can also define its own properties and methods.
 * 
 * @class
 * @name CommentsController
 * @extends Controller
 */
class CommentsController extends Controller
{

    /**
     * The `public function add($id)` method is adding a new comment to an article with the given `$id`. It first checks if the `$_POST` data is valid and if the user is logged in. If both conditions are met, it creates a new `CommentsModel` object, sets the content, article ID, and user ID of the comment, and calls the `create()` method to save the comment to the database. Finally, it redirects the user to the article page.
     * 
     */
    public function add($id)
    {
        if ($this->validate($_POST, ['content']) && isset($_SESSION['user_id'])) {

            $comment = new CommentsModel;
            $comment->setContent($_POST['content'])
                ->setArticles_id($id)
                ->setUsers_id($_SESSION['user_id']);
                
            $comment->create();

            header('Location: /articles/read/' . $id);
        }
    }

    /**
     * The `public function remove($id)` method is removing a comment with the given `$id`. It first retrieves the comment from the database using the `CommentsModel` class and the `findBy()` method. Then, it calls the `delete()` method of the `CommentsModel` class to delete the comment from the database. Finally, it redirects the user to the article page that the comment was associated with.
     * 
     */
    public function remove($id)
    {
        $commentModel = new CommentsModel;
        $comment = $commentModel->findBy(['id' => $id]);
    
        $commentMD = new CommentsModel;
        $commentMD->delete($id);

        header('Location: /articles/read/'.$comment[0]['articles_id']);
    }
}
