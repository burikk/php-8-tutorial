<?php

declare(strict_types=1);

namespace App\Controller;

use App\App;
use App\View;

class HomeController
{
    public function index(): View
    {
        $db = App::db();
        return View::make('index.php');
    }
}