<?php

namespace CentralCondo\Http\Controllers\Portal;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use CentralCondo\Http\Controllers\Controller;


class HomeController extends Controller
{

    public function index()
    {
        $config['title'] = 'Novo usuário';

        return view('portal.block.index', compact('config'));
    }

}
