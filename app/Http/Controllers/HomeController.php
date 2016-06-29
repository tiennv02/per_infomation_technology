<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/29/2016
 * Time: 5:46 PM
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index(){
        return view("front.index");
    }
}