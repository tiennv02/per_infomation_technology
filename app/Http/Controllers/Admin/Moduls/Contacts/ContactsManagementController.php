<?php

/**
 * Created by PhpStorm.
 * User: forever-pc
 * Date: 10/07/2016
 * Time: 2:17 CH
 */
namespace App\Http\Controllers\Admin\Moduls\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;
use App\Http\Util\PagingPresenter;
use App\Http\Util\CustomPresenter;
use Illuminate\Pagination\Paginator;
use App\Http\Responses\ContactsResponse;
use App\Http\Requests\ContactsRequest;
use App\Http\Requests\ContactsUpdateRequest;

class ContactsManagementController extends Controller
{
    private $contactsRepository;

    public function __construct(ContactsRepository $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
    }

    public function index()
    {
        $object = $this->contactsRepository->getLstContacts();
        $presenter = new CustomPresenter($object);
        return view('admin.moduls.contacts.index',compact('object', 'presenter'));
    }

    public function get(Request $request, $id)
    {
        $contacts = $this->contactsRepository->getContactsById($id);
        return response()->json($contacts);
    }

    public function update(
        ContactsUpdateRequest $request,
        $id)
    {
        $data = new ContactsResponse();
        try {
            $data = $this->contactsRepository->update($request->all(), $id);
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }
}