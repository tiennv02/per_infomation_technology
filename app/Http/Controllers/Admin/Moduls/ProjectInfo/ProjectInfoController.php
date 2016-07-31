<?php

/**
 * Created by PhpStorm.
 * User: forever-pc
 * Date: 10/07/2016
 * Time: 2:17 CH
 */
namespace App\Http\Controllers\Admin\Moduls\ProjectInfo;

use App\Http\Controllers\Controller;
use App\Models\ProjectInfo;
use App\Repositories\ProjectInfoRepository;
use App\Util\Constants;
use App\Util\UploadFile;
use Illuminate\Http\Request;
use Image;
use Input;

class ProjectInfoController extends Controller
{
    private $projectInfoRepository;

    public function __construct(ProjectInfoRepository $projectInfoRepository)
    {
        $this->projectInfoRepository = $projectInfoRepository;
    }

    public function getIndex(Request $request)
    {
        $object = $this->projectInfoRepository->getLstProjectInfo($request->all());
        return view('admin.moduls.projectInfo.index', compact('object'));
    }

    public function getCreate(Request $request)
    {
        return view('admin.moduls.projectInfo.edit');
    }

    public function destroy()
    {
        return view('admin.moduls.projectInfo.edit');
    }

    public function store()
    {
        $file_name = "";
        // upload file
        if (Input::file('image')) {
            $image = Input::file('image');
            $file_name = str_random(25) . "." . $image->getClientOriginalExtension();
            $path = public_path('img/portfolio/' . $file_name);
            $uploadFile = new UploadFile();
            $reponse = $uploadFile->uploadFile($image, $path);
            if ($reponse->getResultCode() && $reponse->getResultCode() == Constants::$_resultCode["ERROR"]) {
                return redirect()->back()->withInput()->withErrors($reponses->getResultMessage());
            }
        }
        // create a new model instance
        $projectInfo = new ProjectInfo();
        $projectInfo->name = e(Input::get('name'));
        $projectInfo->description = e(Input::get('description'));
        $projectInfo->content = e(Input::get('contents'));
        $projectInfo->image = $file_name;
        $projectInfo->order = $this->projectInfoRepository->getMaxOrder() + 1;
        $reponse = $this->projectInfoRepository->store($projectInfo);
        if ($reponse->getResultCode() && $reponse->getResultCode() == Constants::$_resultCode["OK"]) {
            return redirect()->to("admin/moduls/projectInfo")->with('success', 'Đã thêm mới thành công');
        } else {
            return redirect()->back()->withInput()->withErrors($reponse->getResultMessage());
        }
        return redirect()->to('admin/moduls/projectInfo/create')->with('error', 'Có lỗi xảy ra, Xin vui lòng thử lại sau!.');
    }
}