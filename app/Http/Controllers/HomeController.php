<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/29/2016
 * Time: 5:46 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Responses\ContactsResponse;
use App\Http\Requests\ContactsRequest;
use App\Repositories\ContactsRepository;
use App\Jobs\SendMail;
use App\Http\Objects\ObjectSendMail;

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

    public function contactsCreate(ContactsRequest $request)
    {
        $data = new ContactsResponse();
        try {
            $field = $request->all();
            $response = $this->contactsRepository->store($field);
            if ($response && $response->getResultCode() == 'OK') {
                // send mail
                $i = 0;
                while ($i < 10) {
                    $i++;
                    $objectSendMail = new ObjectSendMail();
                    $objectSendMail->setEmail($field['email']);
                    $objectSendMail->setUsername($field['name']);
                    $objectSendMail->setTitle('Thư cám ơn đã gửi thư liên hệ');
                    $objectSendMail->setContent($field['content']);
                    $this->dispatch(new SendMail($objectSendMail));
                }
            } else {
                $data->setResultCode('ERROR');
                $data->setResultMessage($response->getResultMessage());
            }
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }
}