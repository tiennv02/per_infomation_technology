<?php
/**
 * Created by PhpStorm.
 * User: forever-pc
 * Date: 05/07/2016
 * Time: 10:15 CH
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view("admin.index");
    }
}