<?php

namespace App\Services;

class IngredientImageUploader extends ImageUploader
{
    protected function getResolution(): ?array
    {
        return ['540', '540'];
    }

    protected function getPath(): string
    {
        return 'public/ingredients/layers';
    }
}