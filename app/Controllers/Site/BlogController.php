<?php
// app/Controllers/BlogController.php

namespace App\Controllers\Site;

use App\Core\Controller;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $postModel = new Post();
        $posts = $postModel->todos();

        $this->view('blog', ['posts' => $posts]);
    }

    public function post($slug = null)
    {
        if (!$slug) {
            $this->view('404');
            return;
        }

        $post = $this->model('Post')->encontrarPorSlug($slug);
        if (!$post) {
            $this->view('404');
            return;
        }

        $this->view('post', ['post' => $post]);
    }

}
