<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class APIService
{
    /**
     * PC platform id
     *
     * @var int
     */
    public const PC_PLATFORM = '6';

    /**
     * PS4 platform id
     *
     * @var int
     */
    public const PS4_PLATFORM = '48';

    /**
     * XOne platform id
     *
     * @var int
     */
    public const XONE_PLATFORM = '49';

    /**
     * PS5 platform id
     *
     * @var int
     */
    public const PS5_PLATFORM = '167';

    /**
     * Request URL
     *
     * @var string
     */
    public const BASE_URL = 'https://api.igdb.com/v4';

    /**
     * Query string
     *
     * @var string
     */
    private $query;

    /**
     * Constructor method
     *
     * @param string $path Path for request URL
     * 
     * @return void
     */
    public function __construct(private string $path)
    {
    }

    /**
     * Constructor method
     *
     * @param string $path Path for request URL
     * 
     * @return APIService
     */
    public static function url(string $path): APIService
    {
        return new APIService($path);
    }

    /**
     * Sends request to IGDB API Database
     * 
     * @return Collection
     */
    public function get(): Collection
    {
        return Http::withHeaders(config('services.igdb'))
            ->withBody($this->query)
            ->post(self::BASE_URL . '/' . $this->path)
            ->collect();
    }

    /**
     * Creates query string for search option
     * 
     * @param string $input game name
     * 
     * @return APIService
     */
    public function search(string $input): APIService
    {
        $this->query .= "search \"{$input}\";";

        return $this;
    }

    /**
     * Adds a select statement to the query string
     * 
     * @param array $fields
     * 
     * @return APIService
     */
    public function select(array $fields): APIService
    {
        $this->query .= 'fields ' . implode(',', $fields) . ';';

        return $this;
    }

    /**
     * Adds a where clause to the query string
     * 
     * @param array $fields
     * 
     * @return APIService
     */
    public function where(array $fields): APIService
    {
        $this->query .= 'where ';

        foreach ($fields as $field) {
            $this->query .= implode(' ', $field) . '&';
        }

        $this->query = rtrim($this->query, "&") . ';';

        return $this;
    }

    /**
     * Sorts the result-set in ascending order
     * 
     * @param string $condition
     * 
     * @return APIService
     */
    public function sortAsc(string $condition): APIService
    {
        $this->query .= "sort {$condition} asc;";

        return $this;
    }

    /**
     * Sorts the result-set in descending order
     * 
     * @param string $condition
     * 
     * @return APIService
     */
    public function sortDesc(string $condition): APIService
    {
        $this->query .= "sort {$condition} desc;";

        return $this;
    }

    /**
     * Sets the limit for the result-set
     * 
     * @param int $number
     * 
     * @return APIService
     */
    public function limit(int $number): APIService
    {
        $this->query .= "limit {$number};";

        return $this;
    }

    /**
     * Returns the built query
     * 
     * @return string
     */
    public function getQueryString(): string
    {
        return $this->query;
    }
}
