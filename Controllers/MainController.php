<?php

namespace App\Controllers;

use App\Models\ArticlesModel;

/**
 * `class MainController extends Controller` is defining a new class called `MainController` that extends the `Controller` class. This means that `MainController` inherits all the properties and methods of the `Controller` class and can also have its own unique properties and methods.
 * 
 * @class
 * @name MainController
 * @extends Controller
 */
class MainController extends Controller
{

    /**
     * The `public function index()` is defining a method called `index()` that can be accessed from outside the class. This method is responsible for rendering the `main/index` view using the `render()` method inherited from the `Controller` class.
     * 
     */
    public function index()
    {

        $this->render('main/index');
    }
}
