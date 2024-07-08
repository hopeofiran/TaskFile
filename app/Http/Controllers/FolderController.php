<?php

namespace App\Http\Controllers;

use App\Constants\StatusCodeConstant;
use App\Http\Macros\ResponseMacro;
use App\Http\Requests\StorefolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Http\Resources\FolderResource;
use App\Models\folder;
use App\Services\FolderService;

class FolderController extends Controller
{
    private FolderService $folderService;
    public function __construct(FolderService $folderService)
    {
        $this->folderService = $folderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $folders = $this->folderService->all();
        $data    = FolderResource::collection($folders)->map(function (FolderResource $resource){
            return $resource
                ->withFolderChildren()
                ->withParent();
        });
        return ResponseMacro::success(__('Get folders has been successfully.'), $data, StatusCodeConstant::GET_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefolderRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorefolderRequest $request)
    {
        $result = Folder::query()->create([
            'name'      => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
        ]);
        $data    = new FolderResource($result);
        return ResponseMacro::success(__('Add folder has been successfully.'), $data, StatusCodeConstant::CREATE_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFolderRequest  $request
     * @param  \App\Models\folder                      $folder
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFolderRequest $request, folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(folder $folder)
    {
        //
    }
}
