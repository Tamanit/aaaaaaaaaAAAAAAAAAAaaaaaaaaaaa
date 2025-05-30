<?php

namespace App\Shared\Http\Controllers;

use App\Shared\Dto\FormDto\FormMeta;
use App\Shared\Dto\IndexDto\IndexMeta;
use App\Shared\Dto\ShowDto\ShowMeta;
use App\Shared\Enumeration\InputTypes;
use App\Shared\UseCase\deleteUseCase;
use App\Shared\UseCase\getCreateFormUseCase;
use App\Shared\UseCase\getIndexUseCase;
use App\Shared\UseCase\getShowUseCase;
use App\Shared\UseCase\getUpdateFormUseCase;
use App\Shared\UseCase\saveOrUpdateUseCase;
use App\Shared\ViewConfing\ViewConfig;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\Console\Input\Input;

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

        return redirect()->route($this::$route . '.index');
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
