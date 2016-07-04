<?php namespace App\Repositories;

use App\Models\Contacts;
use App\Http\Responses\Response;

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
            $contacts->save();
        } catch (Exception $e) {
            $data->setResultCode('ERROR');
            $data->setResultMessage($e);
        }
        return $data;
    }
}