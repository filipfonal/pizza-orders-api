<?php

namespace App\Http\Resources\Admin;

use Storage;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantsTable extends AbstractAdminTable
{
    public function getModelClass(): string
    {
        return Restaurant::class;
    }

    public function getPagination(): int
    {
        return 25;
    }

    public function getColumns(): array
    {
        return [
            [ 'name' => 'id', 'label' => __('id'), 'sortable' => true, 'searchable' => false ],
            [ 'name' => 'token', 'label' => __('token'), 'sortable' => false, 'searchable' => true ],
            [ 'name' => 'name', 'label' => __('name'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'city', 'label' => __('city'), 'sortable' => true, 'searchable' => true ],
            [ 'name' => 'address', 'label' => __('address'), 'sortable' => false, 'searchable' => true ],
            [ 'name' => 'phone', 'label' => __('phone'), 'sortable' => false, 'searchable' => true ],
            [ 'name' => 'description', 'label' => __('description'), 'sortable' => false, 'searchable' => true ],
            [ 'name' => 'created_at', 'label' => __('created_at'), 'sortable' => true, 'searchable' => false ],
            [ 'name' => 'visible', 'label' => __('visible'), 'sortable' => false , 'searchable' => false],
            [ 'name' => 'confirmed', 'label' => __('confirmed'), 'sortable' => false , 'searchable' => false],
            [ 'name' => 'owner', 'label' => __('owner') ],
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->resource->id,
            'token' => $this->resource->token,
            'name' => $this->resource->name,
            'city' => $this->resource->city,
            'address' => $this->resource->address,
            'phone' => $this->resource->phone,
            'photo' => url(Storage::url($this->resource->photo)),
            'description' => $this->resource->description,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
            'visible' => (bool)$this->resource->visible,
            'confirmed' => (bool)$this->resource->confirmed,
            'owner' => User::find($this->resource->owner_id, ['id', 'name']),
        ];
    }

}
