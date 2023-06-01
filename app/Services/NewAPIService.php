<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;


class NewAPIService
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

    public static function url(string $path): NewAPIService
    {
        return new NewAPIService($path);
    }

    public function get(): Collection
    {
        return Http::withHeaders(config('services.igdb'))
            ->withBody($this->query)
            ->post(self::BASE_URL . '/' . $this->path)
            ->collect();
    }

    public function select(array $fields): NewAPIService
    {
        $this->query .= 'fields ' . implode(',', $fields) . ';';

        return $this;
    }

    public function where(array $fields): NewAPIService
    {
        $this->query .= 'where ' . implode(',', $fields) . ';';

        return $this;
    }

    public function sort(string $condition): NewAPIService
    {
        $this->query .= 'sort ' . $condition . ';';

        return $this;
    }

    public function limit(int $number): NewAPIService
    {
        $this->query .= 'limit ' . $number . ';';

        return $this;
    }

    public function getQueryString(): string
    {
        return $this->query;
    }
}
