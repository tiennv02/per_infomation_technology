<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/29/2016
 * Time: 5:59 PM
 */

namespace App\Http\Response;


class ContactsResponse extends Response
{
    /**
     * @var list contacts
     */
    public $lstConstacts;

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
    public function getLstConstacts()
    {
        return $this->lstConstacts;
    }

    /**
     * @param list $lstConstacts
     */
    public function setLstConstacts($lstConstacts)
    {
        $this->lstConstacts = $lstConstacts;
    }


}