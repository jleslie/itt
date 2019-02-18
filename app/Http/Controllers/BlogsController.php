<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Content;

class BlogsController extends Controller
{
    private $pageTitle = 'Blog Controller';

    /**
     * Load page with all blog content (type of post)
     */
    public function index($id = null)
    {
        if ($id) {
            $content = Content::with('user')->where('id', $id)->get();
        } else {
            $content = Content::with('user')->where('type', 'post')->get();
        }
        
        return view(
            'blog.index',
            [
                'contents' => $content,
                'pageTitle' => $this->pageTitle
            ]
        );
    }
}
