<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

/**
 * OptionsWithCacheTrait
 * @author Ehsan Farooqi <https://github.com/eafarooqi>
 *
 * This trait allows 2 model columns to be returned as key value in collection.
 * The collection can be used to fill select in html.
 * Also cache the collection for 8 hours (28800 seconds) by default.
 * The data can be used to display in dropdowns or any other structure.
 * first column is 'id' and second is 'name' by default.
 * The trait automatically clear the cache at saving event.
 *
 * Usage:
 * Just add to the model with use keyword use.
 * e.g. use OptionsWithCacheTrait;
 *
 * Override:
 * To Override the query function in model use the trait as follows.
 * use OptionsWithCacheTrait {
 *  getOptionsQuery as protected traitGetOptionsQuery;
 * }
 * then define a function getOptionsQuery() and
 * extent traitGetOptionsQuery or return a new query to override.
 * OR
 * you can pass your query as parament: query
 *
 * @package App
 */
trait OptionsWithCacheTrait
{
    /**
     * default value for the cache lifetime.
     * only getting used in trait.
     * Please use CACHE_OPTIONS_LIFE to override this in model.
     *
     * @var int
    */
    public static int $defaultCacheLifeTime = 28800;

    public static function bootOptionsWithCacheTrait(): void
    {
        // Deleting cache on update.
        static::saving(function ($model) {
            Cache::forget(self::getCacheKey());
        });
    }

    public static function optionsWithCache(string $dataColumn = 'name',  string $keyColumn = 'id', string $sortBy = 'name', Builder $query=null)
    {
        return Cache::remember(self::getCacheKey(), self::getCacheLife(), function() use($dataColumn, $keyColumn, $sortBy, $query) {
            return self::getOptionsQuery($sortBy, $query)->pluck($dataColumn, $keyColumn);
        });
    }

    public static function OptionsWithCacheIndexed(string $value ='id', string $label='name', string $dataColumn = 'name',  string $keyColumn = 'id', string $sortBy = 'name', Builder $query=null)
    {
        $options = self::optionsWithCache($dataColumn, $keyColumn, $sortBy, $query);
        return $options->map(function($option, $key) use($value, $label) {
            return [$value => $key, $label => $option];
        });
    }

    public static function getOptionsQuery(string $sortBy = 'name', Builder $query=null): Builder
    {
        if(!$query)
        {
            $query = self::query();
        }

        return $query->orderBy($sortBy);
    }

    /**
     * Get Cache Key
     *
     * @return string
    */
    public static function getCacheKey(): string
    {
        return defined(static::class.'::CACHE_OPTIONS_KEY') ? static::CACHE_OPTIONS_KEY : class_basename(self::class).'Options';
    }

    /**
     * Get Cache lifetime.
     *
     *  cache life in seconds
     *  28800 -> 8 Hours
     *
     * @return string
    */
    public static function getCacheLife(): string
    {
        return defined(static::class.'::CACHE_OPTIONS_LIFE') ? static::CACHE_OPTIONS_LIFE : self::$defaultCacheLifeTime;
    }
}
