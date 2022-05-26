<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private object $model;

    public function __construct(){
        $this->model = Post::query();
        
    }

    public function index(){
        return $this->model->paginate();
    }

}
