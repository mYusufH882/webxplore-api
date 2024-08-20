<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FolderInputRequest;
use App\Models\Folder;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $folder = Folder::query();
        $folders = $folder->get();

        return $this->successResponse($folders, "List Folder");
    }

    public function storeFolder(FolderInputRequest $request)
    {
        DB::beginTransaction();

        try {

            $folder = new Folder();
            $folder->name = $request->name;
            $folder->parent_id = $request->parent_id;            
            $folder->save();

            DB::commit();

            return $this->successResponse($folder, "Folder berhasil dibuat !!!");
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateFolder(FolderInputRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $folder = Folder::find($id);
            if(!$folder) {
                return $this->errorResponse([], 'Folder tidak ditemukan !!!', 404);
            }

            if($request->has('name')) {
                $folder->name = $request->name;
            }

            if($request->has('parent_id')) {
                $folder->parent_id = $request->parent_id;
            }

            $folder->save();

            DB::commit();

            return $this->successResponse($folder, "Folder berhasil diubah !!!");
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroyFolder($id)
    {
        DB::beginTransaction();
        try {

            $folder = Folder::find($id);
            
            if(!$folder) {
                return $this->errorResponse([], 'Folder tidak ditemukan !!!', 404);
            }

            $folder->delete();

            DB::commit();

            return $this->successResponse($folder, 'Folder berhasil dihapus !!!');
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
