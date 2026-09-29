<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        return view('pages/home', ['title' => 'Point-of-Sale Foundations', 'activePage' => 'home']);
    }

    public function about(): string
    {
        return view('pages/about', ['title' => 'About the Project', 'activePage' => 'about']);
    }
}
