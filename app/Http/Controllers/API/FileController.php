<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileInputRequest;
use App\Models\Files;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $file = Files::query();
        $files = $file->get();

        return $this->successResponse($files, 'List Files');
    }

    public function FilesbyFolder($id)
    {
        $file = Files::query();
        $files = $file->with('folder')
                    ->where('id', $id)
                    ->get();

        return $this->successResponse($files, 'Files selected by folder !');
    }

    public function storeFile(FileInputRequest $request)
    {
        DB::beginTransaction();

        try {
            $uploadedFile = $request->file('file');
            $filePath = $uploadedFile->store('files');

            $file = new Files();
            $file->name = $request->name;
            $file->folder_id = $request->folder_id;
            $file->path = $filePath;
            $file->mime_type = $uploadedFile->getClientMimeType();
            $file->size = $uploadedFile->getSize();
            $file->save();

            DB::commit();

            return $this->successResponse($file, 'File berhasil dibuat !!!');
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;   
        }
    }

    public function updateFile(FileInputRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $file = Files::find($id);

            if(!$file) {
                return $this->errorResponse([], 'File tidak ditemukan !!!', 404);
            }

            if($request->hasFile('file')) {
                Storage::delete($file->path);

                $updloadedFile = $request->file('file');
                $filePath = $updloadedFile->store('files');

                $file->path = $filePath;
                $file->mime_type = $updloadedFile->getClientMimeType();
                $file->size = $updloadedFile->getSize();
            }

            $file->name = $request->name;
            $file->folder_id = $request->folder_id;
            $file->save();

            DB::commit();

            return $this->successResponse($file, 'File berhasil diubah !!!');
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;   
        }
    }

    public function destroyFile($id)
    {
        DB::beginTransaction();

        try {
            $file = Files::find($id);

            if(!$file) {
                return $this->errorResponse([], 'File tidak ditemukan !!!', 404);
            }

            Storage::delete($file->path);

            $file->delete();

            DB::commit();

            return $this->successResponse($file, 'File berhasil dihapus !!!');
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;   
        }
    }
}
