<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/29/2016
 * Time: 5:46 PM
 */

namespace App\Http\Controllers;


use App\Http\Response\ContactsResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App\Repositories\ContactsRepository;

class HomeController extends Controller
{
    private $contactsRepository;

    public function __construct(ContactsRepository $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
    }

    public function index()
    {
        return view("front.index");
    }

    public function contactsCreate(Request $request)
    {
        $data = new ContactsResponse();
        try {
            $data = $this->contactsRepository->store($request->all());
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }
}