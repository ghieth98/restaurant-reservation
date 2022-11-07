<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Http\RedirectResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    /**
     * @param UploadFileRequest $request
     * @param $model
     * @param $id
     * @return RedirectResponse
     */
    public function upload(UploadFileRequest $request, $model, $id): RedirectResponse
    {
        $uploadedMedia = app('App\Models\\' . $model)::find($id);

        $uploadedMedia->addMedia($request->file)->toMediaCollection();

        return back()->with('toast_success', 'File Uploaded Successfully');
    }

    /**
     * @param Media $mediaItem
     * @return Media
     */
    public function download(Media $mediaItem): Media
    {
        return $mediaItem;
    }

    /**
     * @param $model
     * @param $id
     * @param Media $mediaItem
     * @return RedirectResponse
     */
    public function destroy($model, $id, Media $mediaItem): RedirectResponse
    {
        $mediaItem->delete();

        return redirect()->route(strtolower($model) . 's.edit', $id);
    }
}
