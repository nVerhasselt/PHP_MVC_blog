<?php

namespace App\Controllers;

use App\Models\ArticlesModel;

class MainController extends Controller
{
    public function index()
    {

        $this->render('main/index');
    }
}
