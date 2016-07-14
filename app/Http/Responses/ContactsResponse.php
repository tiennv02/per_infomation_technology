<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/29/2016
 * Time: 5:59 PM
 */

namespace App\Http\Responses;


class ContactsResponse extends Response
{
    /**
     * @var list contacts
     */
    public $lstContacts;

    /**
     * ContactsResponse constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return list
     */
    public function getLstContacts()
    {
        return $this->lstContacts;
    }

    /**
     * @param list $lstContacts
     */
    public function setLstContacts($lstContacts)
    {
        $this->lstContacts = $lstContacts;
    }


}