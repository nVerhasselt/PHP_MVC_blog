<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\CommentsModel;

class CommentsController extends Controller
{



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
    public function remove($id)
    {
        $commentModel = new CommentsModel;
        $comment = $commentModel->findBy(['id' => $id]);
    

        $commentMD = new CommentsModel;
        $commentMD->delete($id);


        header('Location: /articles/read/'.$comment[0]['articles_id']);
    }
}
