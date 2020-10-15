<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * @return News[]|Collection
     */
    public function index()
    {
        return News::all();
    }

    /**
     * @param NewsRequest $request
     * @return mixed
     */
    public function store(NewsRequest $request)
    {
        return News::create($request->all()->validated());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        return News::findOrFail($id);
    }

    /**
     * @param string $title
     * @return mixed
     */
    public function showByName(string $title)
    {
        return News::all()->where('title', $title);
    }

    /**
     * @param NewsRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(NewsRequest $request, int $id)
    {
        $news = News::findOrFail($id);
        $news->fill($request->except($id));
        $news->save();
        return response()->json($news);
    }

    /**
     * @param int $id
     * @return Application|ResponseFactory|Response
     */
    public function destroy(int $id)
    {
        $news = News::findOrFail($id);
        if ($news->delete())
            return response(null, 204);
    }

}
