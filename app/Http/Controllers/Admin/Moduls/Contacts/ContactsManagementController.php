<?php

/**
 * Created by PhpStorm.
 * User: forever-pc
 * Date: 10/07/2016
 * Time: 2:17 CH
 */
namespace App\Http\Controllers\Admin\Moduls\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsUpdateRequest;
use App\Http\Responses\ContactsResponse;
use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;

class ContactsManagementController extends Controller
{
    private $contactsRepository;

    public function __construct(ContactsRepository $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $object = $this->contactsRepository->getLstContacts($request->all());
        return view('admin.moduls.contacts.index', compact('object'));
    }

    public function get(Request $request, $id)
    {
        $contacts = $this->contactsRepository->getContactsById($id);
        return response()->json($contacts);
    }

    public function searchContacts(Request $request)
    {
        $data = new ContactsResponse();
        try {
            $lstContacts = $this->contactsRepository->getLstContacts($request->all());
            $data->setLstContacts($lstContacts);
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }

    public function getLstContacts(Request $request)
    {
        $data = new ContactsResponse();
        try {
            $lstContacts = $this->contactsRepository->getLstContacts($request->all());
            $data->setLstContacts($lstContacts);
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }

    public function update(ContactsUpdateRequest $request, $id)
    {
        $data = new ContactsResponse();
        try {
            $data = $this->contactsRepository->update($request->all(), $id);
            $lstContacts = $this->contactsRepository->getLstContacts($request->all());
            $data->setLstContacts($lstContacts);
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }

    public function delete(Request $request, $id)
    {
        $data = new ContactsResponse();
        try {
            $data = $this->contactsRepository->delete($id);
            $lstContacts = $this->contactsRepository->getLstContacts($request->all());
            $data->setLstContacts($lstContacts);
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return response()->json($data);
    }
}