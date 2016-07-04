<?php namespace App\Repositories;

use App\Models\ProjectInfo;
use App\Http\Responses\Response;

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
}