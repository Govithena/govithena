<?php

class errorController extends Controller
{
    public function index()
    {
        $this->render('error');
    }

    public function pageNotFound()
    {
        $this->render('pageNotFound');
    }
}
