<?php

namespace App\DTO;

use App\Http\Requests\Api\V1\UserIndexRequest;

class UserIndexDto
{
    public ?int $page;
    public ?int $perPage;
    public ?string $includes;
    public ?array $fields;

    public function __construct(UserIndexRequest $request)
    {
        $this->page = $request->input('page') ?? 1;
        $this->perPage = $request->input('per_page') ?? config('data.default_per_page');
        $this->includes = $request->input('includes') ?? null;
        $this->fields = $request->input('fields') ?? null;
    }
}
