<?php namespace App\Repositories;

use App\Http\Responses\Response;
use App\Models\ProjectInfo;
use App\Util\Constants;
use Carbon\Carbon;

class ProjectInfoRepository extends BaseRepository
{

    /**
     * Create a new ProjectInfoRepository instance.
     *
     * @param  App\Models\ProjectInfo $projectInfo
     * @return void
     */
    public function __construct(ProjectInfo $projectInfo)
    {
        $this->model = $projectInfo;
    }

    /**
     * Get ProjectInfo collection.
     *
     * @return Illuminate\Support\Collection
     */
    public function getLstProjectInfo()
    {
        return $this->model->get();
    }

    /**
     * Get max field order
     *
     * @retun int
     */
    public function getMaxOrder()
    {
        return $this->model->max('order');
    }

    /**
     * Create store collection.
     *
     * @return App\Http\Responses\Responsess
     */
    public function create($object)
    {
        $data = new Response();
        try {
            $projectInfo = new $this->model;
            $projectInfo->name = $object->name;
            $projectInfo->description = $object->description;
            $projectInfo->content = $object->content;
            $projectInfo->image = $object->image;
            $projectInfo->order = $object->order;
            $projectInfo->created_at = Carbon::now();
            $projectInfo->updated_at = Carbon::now();
            $projectInfo->save();
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return $data;
    }

    /**
     * Update store collection.
     *
     * @return App\Http\Responses\Responsess
     */
    public function update($object)
    {
        $data = new Response();
        try {
            $projectInfo = $this->getById($object->id);
            $projectInfo->name = $object->name;
            $projectInfo->description = $object->description;
            $projectInfo->content = $object->content;
            if ($object->image) {
                $projectInfo->image = $object->image;
            }
            $projectInfo->order = $object->order;
            $projectInfo->updated_at = Carbon::now();
            $projectInfo->save();
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return $data;
    }

    /**
     * Delete projectInfo collection.
     *
     * @return App\Http\Responses\Responsess
     */
    public function delete($id)
    {
        $data = new Response();
        try {
            $this->getById($id)->delete();
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return $data;
    }

    /**
     * Get projectInfo collection.
     *
     * @return App\Http\Responses\Responsess
     */
    public function getProjectInfoById($id)
    {
        return $this->getById($id);
    }
}