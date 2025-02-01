<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
    	$data['page'] = 'admin_dashboard';
        return view('admin_index',$data);
    }
}
