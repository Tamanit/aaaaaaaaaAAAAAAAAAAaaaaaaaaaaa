<?php

namespace App\Http\Controllers;

use App\Entrypoints\Http\Requests\StoreRestRequest;
use App\Entrypoints\Http\Requests\UpdateRestRequest;
use App\Services\RestService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RestController
{
    protected string $model = Model::class;
    public static string $routeName = '';
    public array $indexMeta = [];
    public array $createMeta = [];

    public function __construct(
        protected RestService $restService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index($limit): \Inertia\Response
    {
        $data = $this->restService->setModel($this->model)->getPagination($this->indexMeta, $limit);

        $this->indexMeta['columns'] = array_values($this->indexMeta['columns']);

        $this->indexMeta['routeName'] = $this::$routeName;

        return Inertia::render('index', [
            'meta' => $this->indexMeta,
            'lines' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        $createMeta = $this->createMeta;

        $createMeta['inputs'][] = [
            'type' => 'hidden',
            'name' => '_token',
            'value' => csrf_token(),
        ];

        $createMeta['submitLink'] = '/' . $this::$routeName;

        return Inertia::render('create', [
            'meta' => $createMeta
        ]);
    }

    protected function store($request): RedirectResponse
    {
        $dataRequest = $request->all();
        if ($dataRequest !== null) {
            $this->model::create($dataRequest);
        }
        return redirect()->route($this::$routeName . '.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): \Inertia\Response
    {
        $model = $this->model::findOrFail($id);
        $model = call_user_func([$this->model, 'find'], $id)->toArray();

        $editMeta = $this->createMeta;

        $editMeta['submitLink'] = '/' . $this::$routeName . '/' . $model['id'];

        $editMeta['inputs'] = array_map(
            function ($value) use ($model) {
                if ($value['type'] === 'table') {
                    if (key_exists('table', $value)) {
                        $tableModel = array_map(function ($value) {
                            return (array)$value;
                        },
                            DB::table($value['table'])->where($value['foreignKey'], $model['id'])->get()->toArray());
                    } else {
                        $tableModel = $value['model']::where($value['condition'], $model['id'])->get()->toArray();
                    }
                    if ($tableModel !== null) {
                        $tmpLimes = [];
                        $inputs = $value['lines'];
                        unset($value['lines']);
                        $value['lines']['inputs'] = $inputs;
                        foreach ($tableModel as $item) {
                            foreach ($value['lines']['inputs'] as $line) {
                                $tmpLimes[$line['name']] = key_exists($line['name'], $item) ? $item[$line['name']] : null;
                            }
                            $value['lines']['values'][] = $tmpLimes;
                        }
                    }
                } else {
                    $value['value'] = key_exists($value['name'], $model) ? $model[$value['name']] : null;
                }
                return $value;
            },
            $editMeta['inputs']
        );;
        $editMeta['inputs'][] = [
            'type' => 'hidden',
            'name' => '_token',
            'value' => csrf_token(),
        ];

        return Inertia::render('update', [
            'meta' => $editMeta,
        ]);
    }

    public function update($request, int $id): RedirectResponse
    {
        $request = $request->all();
        if ($request !== null) {
            $this->restService->setModel($this->model)->getById($id)::update($request);
        }
        return redirect()->route($this::$routeName . '.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->restService->setModel($this->model)->delete($id);
        return redirect()->route($this::$routeName . '.index');
    }
}
