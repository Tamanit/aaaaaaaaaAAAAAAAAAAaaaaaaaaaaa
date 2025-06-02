<?php

namespace App\Http\Controllers;

use App\Http\ViewConfing\ViewConfig;
use App\UseCase\deleteUseCase;
use App\UseCase\getCreateFormUseCase;
use App\UseCase\getIndexUseCase;
use App\UseCase\getShowUseCase;
use App\UseCase\getUpdateFormUseCase;
use App\UseCase\saveOrUpdateUseCase;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RestController extends Controller
{
    public static string $route = '';
    protected string $model = '';

    protected ViewConfig $viewConfig;
    protected string $createRequest = '';
    protected string $updateRequest = '';

    protected getIndexUseCase $getIndexUseCase;
    protected getCreateFormUseCase $getCreateFormUseCase;
    protected saveOrUpdateUseCase $saveOrUpdateUseCase;
    protected deleteUseCase $deleteUseCase;
    protected getUpdateFormUseCase $getUpdateFormUseCase;
    protected getShowUseCase $getShowUseCase;

    public function __construct()
    {
        $this->getIndexUseCase = app(getIndexUseCase::class);
        $this->getCreateFormUseCase = app(getCreateFormUseCase::class);
        $this->saveOrUpdateUseCase = app(saveOrUpdateUseCase::class);
        $this->deleteUseCase = app(deleteUseCase::class);
        $this->getUpdateFormUseCase = app(getUpdateFormUseCase::class);
        $this->getShowUseCase = app(getShowUseCase::class);
    }

    public function index(): \Inertia\Response
    {
        return Inertia::render($this->viewConfig->indexMeta->page, [
            'meta' => $this->viewConfig->indexMeta,
            'paginator' => $this->getIndexUseCase->use($this->model, $this->viewConfig->indexMeta),
            'linkToPublic' => asset('/img/'),
        ]);
    }

    public function create()
    {
        return Inertia::render($this->viewConfig->createMeta->page, [
            'meta' => $this->getCreateFormUseCase->use($this->viewConfig->createMeta, self::$route)
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $this->saveOrUpdateUseCase->use($request, $this->model, null, $this->createRequest);

        if ($request->query('again')) {
            return redirect()->route($this::$route . '.create')->with('message', 'Сохранено!');
        } else {
            return redirect()->route($this::$route . '.index')->with('message', 'Сохранено!');
        }

    }

    public function show($id)
    {
        return Inertia::render($this->viewConfig->showMeta->page, [
            'meta' => $this->getShowUseCase->use($this->viewConfig->showMeta, $this->model, $id)
        ]);
    }

    public function edit($id): \Inertia\Response
    {
        return Inertia::render($this->viewConfig->updateMeta->page, [
            'meta' => $this->getUpdateFormUseCase->use($this->viewConfig->updateMeta, $this->model, self::$route, $id),
            'id' => $id
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->saveOrUpdateUseCase->use($request, $this->model, $id, $this->updateRequest);

        return redirect()->route($this::$route . '.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->deleteUseCase->use($id, $this->model);

        return redirect()->back();
    }
}
