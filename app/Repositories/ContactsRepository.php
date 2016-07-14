<?php namespace App\Repositories;

use App\Http\Responses\ContactsResponse;
use App\Http\Responses\Response;
use App\Models\Contacts;

class ContactsRepository extends BaseRepository
{

    /**
     * Create a new ContactsRepository instance.
     *
     * @param  App\Models\Contacts $contacts
     * @return void
     */
    public function __construct(Contacts $contacts)
    {
        $this->model = $contacts;
    }

    /**
     * Get contacts collection.
     *
     * @return Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->model
            ->oldest('seen')
            ->latest()
            ->get();
    }

    /**
     * Get Contacts collection.
     *
     * @return Illuminate\Support\Collection
     */
    public function getLstContacts()
    {
        $data = $this->model->paginate(10);
        return $data;
    }

    public function searchContacts($inputs = null)
    {
        if ($inputs && $inputs != null) {
            $data = $this->model;
            if (isset($inputs['searchName'])&& $inputs['searchName'] != '') {
                $data = $data->where('name', 'like', '%' . $inputs['searchName'] . '%');
            }
            if (isset($inputs['searchEmail']) && $inputs['searchEmail'] != '') {
                $data = $data->where('email', 'like', '%' . $inputs['searchEmail'] . '%');
            }
            if (isset($inputs['searchPhone']) && $inputs['searchPhone'] != '') {
                $data = $data->where('phone', 'like', '%' . $inputs['searchPhone'] . '%');
            }
            if (isset($inputs['searchType']) && $inputs['searchType'] != '') {
                $data = $data->where('type', '=',  $inputs['searchType']);
            }
            $data = $data->paginate(10);
            return $data;
        }
    }

    /**
     * Store a contacts.
     *
     * @param  array $inputs
     * @return void
     */
    public function store($inputs)
    {
        $data = new Response();
        try {
            $contacts = new $this->model;
            $contacts->name = $inputs['name'];
            $contacts->email = $inputs['email'];
            $contacts->phone = $inputs['phone'];
            $contacts->content = $inputs['content'];
            $contacts->type = 1;
            $contacts->save();
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return $data;
    }

    public function update($inputs, $id)
    {
        $data = new ContactsResponse();
        try {
            $customer = $this->getById($id);
            $customer->type = $inputs['contactsType'];
            $customer->save();
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return $data;
    }

    public function getContactsById($id)
    {
        return $this->getById($id);
    }

    public function delete($id)
    {
        $data = new ContactsResponse();
        try {
            $customer = $this->getById($id);
            $customer->delete();
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return $data;
    }
}