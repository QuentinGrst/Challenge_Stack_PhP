<?php
namespace Controller;

class HomeController extends BaseController
{

    public function Home()
    {
        $this->View('home');
    }

}