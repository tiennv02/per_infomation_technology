<?php namespace App\Repositories;

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
     * Store a contacts.
     *
     * @param  array $inputs
     * @return void
     */
    public function store($inputs)
    {
        $contact = new $this->model;

        $contact->name = $inputs['name'];
        $contact->email = $inputs['email'];
        $contact->phone = $inputs['phone'];
        $contact->content = $inputs['content'];

        $contact->save();
    }
}