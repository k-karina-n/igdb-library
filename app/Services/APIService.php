<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class APIService
{
    public const PC_PLATFORM = '6';
    public const PS4_PLATFORM = '48';
    public const XONE_PLATFORM = '49';
    public const PS5_PLATFORM = '167';

    public const BASE_URL = 'https://api.igdb.com/v4';

    protected $query;

    public function __construct(protected string $path)
    {
    }

    public static function url(string $path): APIService
    {
        return new APIService($path);
    }

    public function get(): Collection
    {
        return Http::withHeaders(config('services.igdb'))
            ->withBody($this->query)
            ->post(self::BASE_URL . '/' . $this->path)
            ->collect();
    }

    public function search(string $input): APIService
    {
        $this->query .= "search \"{$input}\";";

        return $this;
    }

    public function select(array $fields): APIService
    {
        $this->query .= 'fields ' . implode(',', $fields) . ';';

        return $this;
    }

    public function where(array $fields): APIService
    {
        $this->query .= 'where ' . implode(' ', $fields) . ';';

        return $this;
    }

    public function sortAsc(string $condition): APIService
    {
        $this->query .= "sort {$condition} asc;";

        return $this;
    }

    public function sortDesc(string $condition): APIService
    {
        $this->query .= "sort {$condition} desc;";

        return $this;
    }

    public function limit(int $number): APIService
    {
        $this->query .= "limit {$number};";

        return $this;
    }

    public function getQueryString(): string
    {
        return $this->query;
    }
}
