<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Blog\PostTranslation;
class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;



    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('dashboard');
    }

}

