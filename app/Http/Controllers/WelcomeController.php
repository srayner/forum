<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class WelcomeController
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::all();

        return view('welcome', ['categories' => $categories]);
    }
}
