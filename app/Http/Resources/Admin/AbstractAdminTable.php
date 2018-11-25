<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Interfaces\AdminTableInterface;

abstract class AbstractAdminTable implements AdminTableInterface
{
    protected $resource;
    protected $query;
    protected $paginator = [];

    public function __construct()
    {
        $this->resource = new JsonResource(null);
    }

    public function tableResponse($request = null): JsonResponse
    {
        $response = new JsonResponse();
        $this->query = $this->getModelClass()::query();

        if ($request->search) {
            $this->filterData($request->search);
        }

        if ($request->orderBy) {
            $this->sortData($request->orderBy);
        } else if($request->orderByDesc) {
            $this->sortDescData($request->orderByDesc);
        }

        if($this->getPagination()) {
            $this->setPagination();
        }

        $this->collect(
            $this->query->get()
        );

        $data = $this->getData();

        $response->setData([
            'data' => $data,
            'meta' => $this->with()
        ]);

        return $response;
    }

    public function collect($resource): AdminTableInterface
    {
        $this->resource->resource = $resource;
        return $this;
    }

    public function with(): array
    {
        return [
            'columns' => $this->getColumns(),
            'paginator' => $this->paginator
        ];
    }

    public function getPagination(): int
    {
        return 0;
    }

    protected function getData(): array
    {
        $data = [];
        foreach($this->resource->resource as $resource) {
            $this->resource->resource = $resource;
            $data[] = $this->toArray();
        }

        return $data;
    }

    protected function sortData(string $column)
    {
        if ($this->isColumnSortable($column)) {
            $this->query->orderBy($column);
        }
    }

    protected function sortDescData(string $column)
    {
        if ($this->isColumnSortable($column)) {
            $this->query->orderByDesc($column);
        }
    }

    protected function filterData(string $search)
    {
        $searchableColumns = $this->getSearchableColumns();
        foreach($searchableColumns as $column) {
            $this->query->orWhere($column['name'], 'LIKE', '%' . $search . '%');
        }
    }

    protected function isColumnSortable(string $name)
    {
        $found = array_values(array_filter($this->getColumns(), function ($column) use ($name) {
            return ($column['name'] == $name);
        }));

        if(!$found) {
            return false;
        }

        $found = $found[0];

        return isset($found['sortable']) && $found['sortable'];
    }

    protected function getSearchableColumns(): array
    {
        return array_filter($this->getColumns(), function ($column) {
            return isset($column['searchable']) && $column['searchable'];
        });
    }

    protected function setPagination()
    {
        $data = $this->query->paginate(
            $this->getPagination()
        );

        $this->paginator = [
            'current_page' => $data->currentPage(),
            'last_page' => $data->lastPage(),
        ];
    }
}