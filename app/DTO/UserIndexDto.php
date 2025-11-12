<?php

namespace App\DTO;

use App\Http\Requests\Api\V1\UserIndexRequest;

class UserIndexDto
{
    public ?int $page;
    public ?int $perPage;
    public array|string|null $includes;
    public ?array $fields;

    public function __construct(UserIndexRequest $request)
    {
        $this->page = $request->input('page') ?? 1;
        $this->perPage = $request->input('per_page') ?? config('data.default_per_page');
        $this->includes = $request->input('includes') ?? null;
        $this->fields = $request->input('fields') ?? null;
    }

    public function normalize(): void
    {
        $this->includes = $this->includes !== null
            ? array_map('trim', explode(',', $this->includes))
            : [];

        $fields = [];
        $fields['users'] = !empty($this->fields['users'])
            ? array_map('trim', explode(',', $this->fields['users']))
            : config('data.default_fields.users_index.users');

        unset($this->fields['users']);

        foreach ($this->includes as $include) {
            if (array_key_exists($include, $this->fields)) {
                $fields[$include] = array_map('trim', explode(',', $this->fields[$include]));
            } else {
                $fields[$include] = config("data.default_fields.users_index.{$include}") ?? [];
            }
        }

        $this->fields = $fields;
    }
}
