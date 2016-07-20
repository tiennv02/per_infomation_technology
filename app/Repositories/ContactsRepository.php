<?php namespace App\Repositories;

use App\Http\Responses\ContactsResponse;
use App\Http\Responses\Response;
use App\Models\Contacts;
use App\Util\Constants;

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
    public function getLstContacts($inputs = null)
    {
        $currentPage = Constants::$_page["CURRENT_PAGE"];
        $limitRows = Constants::$_page["LIMIT_ROWS"];
        $showLinkTotal = Constants::$_page["SHOW_LINK_TOTAL"];
        $lst = $this->model;
        if ($inputs && $inputs != null) {
            if (isset($inputs['pages']) && $inputs['pages'] != '') {
                $currentPage = $inputs['pages'];
            }
            if (isset($inputs['searchName']) && $inputs['searchName'] != '') {
                $lst = $lst->where('name', 'like', '%' . $inputs['searchName'] . '%');
            }
            if (isset($inputs['searchEmail']) && $inputs['searchEmail'] != '') {
                $lst = $lst->where('email', 'like', '%' . $inputs['searchEmail'] . '%');
            }
            if (isset($inputs['searchPhone']) && $inputs['searchPhone'] != '') {
                $lst = $lst->where('phone', 'like', '%' . $inputs['searchPhone'] . '%');
            }
            if (isset($inputs['searchType']) && $inputs['searchType'] != '') {
                $lst = $lst->where('type', '=', $inputs['searchType']);
            }
        }
        $lst = $lst->skip(($currentPage - 1) * $limitRows)->take($limitRows)->get();
        $count = $this->model->count();
        //last page
        $total = $count;
        $lastPage = 0;
        while ($total > 0) {
            $lastPage++;
            $total -= $limitRows;
        }
        $data = array(
            'lstContacts' => $lst,
            'count' => $count,
            'currentPage' => $currentPage,
            'showLinkTotal' => $showLinkTotal,
            'limitRows' => $limitRows,
            'lastPage' => $lastPage,
        );
        return $data;
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