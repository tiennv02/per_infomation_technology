<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/29/2016
 * Time: 5:59 PM
 */

namespace App\Http\Response;


class ProjectInfoResponse
{
    /**
     * @var list project_info
     */
    public $lstProjectInfo;

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
    public function getLstProjectInfo()
    {
        return $this->lstProjectInfo;
    }

    /**
     * @param list $lstProjectInfo
     */
    public function setLstProjectInfo($lstProjectInfo)
    {
        $this->lstProjectInfo = $lstProjectInfo;
    }


}