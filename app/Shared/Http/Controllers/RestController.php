<?php

namespace App\Shared\Http\Controllers;

use App\Shared\Dto\FormDto\FormMeta;
use App\Shared\Dto\IndexDto\IndexMeta;
use App\Shared\Dto\ShowDto\ShowMeta;
use App\Shared\UseCase\deleteUseCase;
use App\Shared\UseCase\getCreateFormUseCase;
use App\Shared\UseCase\getIndexUseCase;
use App\Shared\UseCase\getShowUseCase;
use App\Shared\UseCase\getUpdateFormUseCase;
use App\Shared\UseCase\saveOrUpdateUseCase;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RestController extends Controller
{
    public static string $route;
    protected string $model;

    protected IndexMeta $indexMeta;

    protected FormMeta $createMeta;
    protected FormMeta $updateMeta;

    protected ShowMeta $showMeta;

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
        return Inertia::render($this->indexMeta->page, [
            'meta' => $this->indexMeta,
            'paginator' => $this->getIndexUseCase->use($this->model, $this->indexMeta),
        ]);
    }

    public function create()
    {
        return Inertia::render($this->createMeta->page, [
            'meta' => $this->getCreateFormUseCase->use($this->createMeta, self::$route),
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->saveOrUpdateUseCase->use($request);

        return redirect()->route($this::$route . '.index');
    }

    public function show($id)
    {
        return Inertia::render($this->showMeta->page, [
            'meta' => $this->getShowUseCase->use($this->showMeta, $id)
        ]);
    }

    public function edit($id): \Inertia\Response
    {
        return Inertia::render($this->updateMeta->page, [
            'meta' => $this->getUpdateFormUseCase->use($this->createMeta, self::$route, $id),
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->saveOrUpdateUseCase->use($request, $id);

        return redirect()->route($this::$route . '.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->deleteUseCase->use($id);

        return redirect()->route($this::$route . '.index');
    }
}
