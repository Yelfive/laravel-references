<?php

namespace Illuminate\Database\Eloquent;

use Illuminate\Database\Query\Builder;
use Closure;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use self;


class Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with;

    /**
     * The relationship counts that should be eager loaded on every query.
     *
     * @var array
     */
    protected $withCount;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage;

    /**
     * Indicates if the model exists.
     *
     * @var bool
     */
    public $exists;

    /**
     * Indicates if the model was inserted during the current request lifecycle.
     *
     * @var bool
     */
    public $wasRecentlyCreated;

    /**
     * The connection resolver instance.
     *
     * @var \Illuminate\Database\ConnectionResolverInterface
     */
    protected static $resolver;

    /**
     * The event dispatcher instance.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected static $dispatcher;

    /**
     * The array of booted models.
     *
     * @var array
     */
    protected static $booted;

    /**
     * The array of global scopes on the model.
     *
     * @var array
     */
    protected static $globalScopes;

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes;

    /**
     * The model attribute's original state.
     *
     * @var array
     */
    protected $original;

    /**
     * The changed model attributes.
     *
     * @var array
     */
    protected $changes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @var bool
     */
    public static $snakeAttributes;

    /**
     * The cache of the mutated attributes for each class.
     *
     * @var array
     */
    protected static $mutatorCache;

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents;

    /**
     * User exposed observable events.
     *
     * These are extra user-defined events observers may subscribe to.
     *
     * @var array
     */
    protected $observables;

    /**
     * The loaded relationships for the model.
     *
     * @var array
     */
    protected $relations;

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches;

    /**
     * The many to many relationship methods.
     *
     * @var array
     */
    public static $manyMethods;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden;

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array
     */
    protected $visible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded;

    /**
     * Create a new Eloquent query builder instance.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * 
     * @see \Illuminate\Database\Eloquent\Builder::__construct()
     */
    public function __construct(Builder $query)
    {
    }

    /**
     * Create and return an un-saved model instance.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::make()
     */
    public static function make(array $attributes = [])
    {
    }

    /**
     * Register a new global scope.
     *
     * @param string $identifier
     * @param \Illuminate\Database\Eloquent\Scope|\Closure $scope
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::withGlobalScope()
     */
    public static function withGlobalScope($identifier, $scope)
    {
    }

    /**
     * Remove a registered global scope.
     *
     * @param \Illuminate\Database\Eloquent\Scope|string $scope
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::withoutGlobalScope()
     */
    public static function withoutGlobalScope($scope)
    {
    }

    /**
     * Remove all or passed registered global scopes.
     *
     * @param array|null $scopes
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::withoutGlobalScopes()
     */
    public static function withoutGlobalScopes(array $scopes = null)
    {
    }

    /**
     * Get an array of global scopes that were removed from the query.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::removedScopes()
     */
    public static function removedScopes()
    {
    }

    /**
     * Add a where clause on the primary key to the query.
     *
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::whereKey()
     */
    public static function whereKey($id)
    {
    }

    /**
     * Add a where clause on the primary key to the query.
     *
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::whereKeyNot()
     */
    public static function whereKeyNot($id)
    {
    }

    /**
     * Add a basic where clause to the query.
     *
     * @param array|string|array|\Closure column
     * @param string $operator
     * @param mixed $value
     * @param string $boolean
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::where()
     */
    public static function where($column, $operator = null, $value = null, $boolean = 'and')
    {
    }

    /**
     * Add an "or where" clause to the query.
     *
     * @param \Closure|array|string $column
     * @param string $operator
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::orWhere()
     */
    public static function orWhere($column, $operator = null, $value = null)
    {
    }

    /**
     * Create a collection of models from plain arrays.
     *
     * @param array $items
     * @return \Illuminate\Database\Eloquent\Collection
     * @see \Illuminate\Database\Eloquent\Builder::hydrate()
     */
    public static function hydrate(array $items)
    {
    }

    /**
     * Create a collection of models from a raw query.
     *
     * @param string $query
     * @param array $bindings
     * @return \Illuminate\Database\Eloquent\Collection
     * @see \Illuminate\Database\Eloquent\Builder::fromQuery()
     */
    public static function fromQuery($query, $bindings = [])
    {
    }

    /**
     * Find a model by its primary key.
     *
     * @param mixed $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     * @see \Illuminate\Database\Eloquent\Builder::find()
     */
    public static function find($id, $columns = ['*'])
    {
    }

    /**
     * Find multiple models by their primary keys.
     *
     * @param \Illuminate\Contracts\Support\Arrayable|array $ids
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection
     * @see \Illuminate\Database\Eloquent\Builder::findMany()
     */
    public static function findMany($ids, $columns = ['*'])
    {
    }

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param mixed $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @see \Illuminate\Database\Eloquent\Builder::findOrFail()
     */
    public static function findOrFail($id, $columns = ['*'])
    {
    }

    /**
     * Find a model by its primary key or return fresh model instance.
     *
     * @param mixed $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::findOrNew()
     */
    public static function findOrNew($id, $columns = ['*'])
    {
    }

    /**
     * Get the first record matching the attributes or instantiate it.
     *
     * @param array $attributes
     * @param array $values
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::firstOrNew()
     */
    public static function firstOrNew(array $attributes, array $values = [])
    {
    }

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param array $attributes
     * @param array $values
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::firstOrCreate()
     */
    public static function firstOrCreate(array $attributes, array $values = [])
    {
    }

    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param array $attributes
     * @param array $values
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::updateOrCreate()
     */
    public static function updateOrCreate(array $attributes, array $values = [])
    {
    }

    /**
     * Execute the query and get the first result or throw an exception.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @see \Illuminate\Database\Eloquent\Builder::firstOrFail()
     */
    public static function firstOrFail($columns = ['*'])
    {
    }

    /**
     * Execute the query and get the first result or call a callback.
     *
     * @param \Closure|array $columns
     * @param \Closure|null $callback
     * @return \Illuminate\Database\Eloquent\Model|static|mixed
     * @see \Illuminate\Database\Eloquent\Builder::firstOr()
     */
    public static function firstOr($columns = ['*'], Closure $callback = null)
    {
    }

    /**
     * Get a single column's value from the first result of a query.
     *
     * @param string $column
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::value()
     */
    public static function value($column)
    {
    }

    /**
     * Execute the query as a "select" statement.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @see \Illuminate\Database\Eloquent\Builder::get()
     */
    public static function get($columns = ['*'])
    {
    }

    /**
     * Get the hydrated models without eager loading.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model[]
     * @see \Illuminate\Database\Eloquent\Builder::getModels()
     */
    public static function getModels($columns = ['*'])
    {
    }

    /**
     * Eager load the relationships for the models.
     *
     * @param array $models
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::eagerLoadRelations()
     */
    public static function eagerLoadRelations(array $models)
    {
    }

    /**
     * Eagerly load the relationship on a set of models.
     *
     * @param array $models
     * @param string $name
     * @param \Closure $constraints
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::eagerLoadRelation()
     */
    protected static function eagerLoadRelation(array $models, $name, Closure $constraints)
    {
    }

    /**
     * Get the relation instance for the given relation name.
     *
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     * @see \Illuminate\Database\Eloquent\Builder::getRelation()
     */
    public static function getRelation($name)
    {
    }

    /**
     * Get the deeply nested relations for a given top-level relation.
     *
     * @param string $relation
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::relationsNestedUnder()
     */
    protected static function relationsNestedUnder($relation)
    {
    }

    /**
     * Determine if the relationship is nested.
     *
     * @param string $relation
     * @param string $name
     * @return bool
     * @see \Illuminate\Database\Eloquent\Builder::isNestedUnder()
     */
    protected static function isNestedUnder($relation, $name)
    {
    }

    /**
     * Get a generator for the given query.
     *
     * @return \Generator
     * @see \Illuminate\Database\Eloquent\Builder::cursor()
     */
    public static function cursor()
    {
    }

    /**
     * Chunk the results of a query by comparing numeric IDs.
     *
     * @param int $count
     * @param callable $callback
     * @param string $column
     * @param string|null $alias
     * @return bool
     * @see \Illuminate\Database\Eloquent\Builder::chunkById()
     */
    public static function chunkById($count, callable $callback, $column = null, $alias = null)
    {
    }

    /**
     * Add a generic "order by" clause if the query doesn't already have one.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Builder::enforceOrderBy()
     */
    protected static function enforceOrderBy()
    {
    }

    /**
     * Get an array with the values of a given column.
     *
     * @param string $column
     * @param string|null $key
     * @return \Illuminate\Support\Collection
     * @see \Illuminate\Database\Eloquent\Builder::pluck()
     */
    public static function pluck($column, $key = null)
    {
    }

    /**
     * Paginate the given query.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param int|null $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Database\Eloquent\Builder::paginate()
     */
    public static function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param int|null $page
     * @return \Illuminate\Contracts\Pagination\Paginator
     * @see \Illuminate\Database\Eloquent\Builder::simplePaginate()
     */
    public static function simplePaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
    }

    /**
     * Save a new model and return the instance.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     * @see \Illuminate\Database\Eloquent\Builder::create()
     */
    public static function create(array $attributes = [])
    {
    }

    /**
     * Save a new model and return the instance. Allow mass-assignment.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model|$this
     * @see \Illuminate\Database\Eloquent\Builder::forceCreate()
     */
    public static function forceCreate(array $attributes)
    {
    }

    /**
     * Update a record in the database.
     *
     * @param array $values
     * @return int
     * @see \Illuminate\Database\Eloquent\Builder::update()
     */
    public static function update(array $values)
    {
    }

    /**
     * Increment a column's value by a given amount.
     *
     * @param string $column
     * @param int $amount
     * @param array $extra
     * @return int
     * @see \Illuminate\Database\Eloquent\Builder::increment()
     */
    public static function increment($column, $amount = 1, array $extra = [])
    {
    }

    /**
     * Decrement a column's value by a given amount.
     *
     * @param string $column
     * @param int $amount
     * @param array $extra
     * @return int
     * @see \Illuminate\Database\Eloquent\Builder::decrement()
     */
    public static function decrement($column, $amount = 1, array $extra = [])
    {
    }

    /**
     * Add the "updated at" column to an array of values.
     *
     * @param array $values
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::addUpdatedAtColumn()
     */
    protected static function addUpdatedAtColumn(array $values)
    {
    }

    /**
     * Delete a record from the database.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::delete()
     */
    public static function delete()
    {
    }

    /**
     * Run the default delete function on the builder.
     *
     * Since we do not apply scopes here, the row will actually be deleted.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::forceDelete()
     */
    public static function forceDelete()
    {
    }

    /**
     * Register a replacement for the default delete function.
     *
     * @param \Closure $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Builder::onDelete()
     */
    public static function onDelete(Closure $callback)
    {
    }

    /**
     * Call the given local model scopes.
     *
     * @param array $scopes
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::scopes()
     */
    public static function scopes(array $scopes)
    {
    }

    /**
     * Apply the scopes to the Eloquent builder instance and return it.
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::applyScopes()
     */
    public static function applyScopes()
    {
    }

    /**
     * Apply the given scope on the current builder instance.
     *
     * @param callable $scope
     * @param array $parameters
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::callScope()
     */
    protected static function callScope(callable $scope, $parameters = [])
    {
    }

    /**
     * Nest where conditions by slicing them at the given where count.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param int $originalWhereCount
     * @return null
     * @see \Illuminate\Database\Eloquent\Builder::addNewWheresWithinGroup()
     */
    protected static function addNewWheresWithinGroup(Builder $query, $originalWhereCount)
    {
    }

    /**
     * Slice where conditions at the given offset and add them to the query as a nested condition.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param array $whereSlice
     * @return null
     * @see \Illuminate\Database\Eloquent\Builder::groupWhereSliceForScope()
     */
    protected static function groupWhereSliceForScope(Builder $query, $whereSlice)
    {
    }

    /**
     * Create a where array with nested where conditions.
     *
     * @param array $whereSlice
     * @param string $boolean
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::createNestedWhere()
     */
    protected static function createNestedWhere($whereSlice, $boolean = 'and')
    {
    }

    /**
     * Set the relationships that should be eager loaded.
     *
     * @param mixed $relations
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::with()
     */
    public static function with($relations)
    {
    }

    /**
     * Prevent the specified relations from being eager loaded.
     *
     * @param mixed $relations
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::without()
     */
    public static function without($relations)
    {
    }

    /**
     * Create a new instance of the model being queried.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::newModelInstance()
     */
    public static function newModelInstance($attributes = [])
    {
    }

    /**
     * Parse a list of relations into individuals.
     *
     * @param array $relations
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::parseWithRelations()
     */
    protected static function parseWithRelations(array $relations)
    {
    }

    /**
     * Create a constraint to select the given columns for the relation.
     *
     * @param string $name
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::createSelectWithConstraint()
     */
    protected static function createSelectWithConstraint($name)
    {
    }

    /**
     * Parse the nested relationships in a relation.
     *
     * @param string $name
     * @param array $results
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::addNestedWiths()
     */
    protected static function addNestedWiths($name, $results)
    {
    }

    /**
     * Get the underlying query builder instance.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Eloquent\Builder::getQuery()
     */
    public static function getQuery()
    {
    }

    /**
     * Set the underlying query builder instance.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::setQuery()
     */
    public static function setQuery($query)
    {
    }

    /**
     * Get a base query builder instance.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Eloquent\Builder::toBase()
     */
    public static function toBase()
    {
    }

    /**
     * Get the relationships being eagerly loaded.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Builder::getEagerLoads()
     */
    public static function getEagerLoads()
    {
    }

    /**
     * Set the relationships being eagerly loaded.
     *
     * @param array $eagerLoad
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::setEagerLoads()
     */
    public static function setEagerLoads(array $eagerLoad)
    {
    }

    /**
     * Get the model instance being queried.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::getModel()
     */
    public static function getModel()
    {
    }

    /**
     * Set a model instance for the model being queried.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::setModel()
     */
    public static function setModel(\Illuminate\Database\Eloquent\Model $model)
    {
    }

    /**
     * Get the given macro by name.
     *
     * @param string $name
     * @return \Closure
     * @see \Illuminate\Database\Eloquent\Builder::getMacro()
     */
    public static function getMacro($name)
    {
    }

    /**
     * Chunk the results of the query.
     *
     * @param int $count
     * @param callable $callback
     * @return bool
     * @see \Illuminate\Database\Eloquent\Builder::chunk()
     */
    public static function chunk($count, callable $callback)
    {
    }

    /**
     * Execute a callback over each item while chunking.
     *
     * @param callable $callback
     * @param int $count
     * @return bool
     * @see \Illuminate\Database\Eloquent\Builder::each()
     */
    public static function each(callable $callback, $count = 1000)
    {
    }

    /**
     * Execute the query and get the first result.
     *
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model|static|null
     * @see \Illuminate\Database\Eloquent\Builder::first()
     */
    public static function first($columns = ['*'])
    {
    }

    /**
     * Apply the callback's query changes if the given "value" is true.
     *
     * @param mixed $value
     * @param callable $callback
     * @param callable $default
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::when()
     */
    public static function when($value, $callback, $default = null)
    {
    }

    /**
     * Pass the query to a given callback.
     *
     * @param \Closure $callback
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Eloquent\Builder::tap()
     */
    public static function tap($callback)
    {
    }

    /**
     * Apply the callback's query changes if the given "value" is false.
     *
     * @param mixed $value
     * @param callable $callback
     * @param callable $default
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::unless()
     */
    public static function unless($value, $callback, $default = null)
    {
    }

    /**
     * Create a new length-aware paginator instance.
     *
     * @param \Illuminate\Support\Collection $items
     * @param int $total
     * @param int $perPage
     * @param int $currentPage
     * @param array $options
     * @return \Illuminate\Pagination\LengthAwarePaginator
     * @see \Illuminate\Database\Eloquent\Builder::paginator()
     */
    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
    }

    /**
     * Create a new simple paginator instance.
     *
     * @param \Illuminate\Support\Collection $items
     * @param int $perPage
     * @param int $currentPage
     * @param array $options
     * @return \Illuminate\Pagination\Paginator
     * @see \Illuminate\Database\Eloquent\Builder::simplePaginator()
     */
    protected static function simplePaginator($items, $perPage, $currentPage, $options)
    {
    }

    /**
     * Add a relationship count / exists condition to the query.
     *
     * @param string $relation
     * @param string $operator
     * @param int $count
     * @param string $boolean
     * @param \Closure|null $callback
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::has()
     */
    public static function has($relation, $operator = '>=', $count = 1, $boolean = 'and', Closure $callback = null)
    {
    }

    /**
     * Add nested relationship count / exists conditions to the query.
     *
     * Sets up recursive call to whereHas until we finish the nested relation.
     *
     * @param string $relations
     * @param string $operator
     * @param int $count
     * @param string $boolean
     * @param \Closure|null $callback
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::hasNested()
     */
    protected static function hasNested($relations, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
    {
    }

    /**
     * Add a relationship count / exists condition to the query with an "or".
     *
     * @param string $relation
     * @param string $operator
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::orHas()
     */
    public static function orHas($relation, $operator = '>=', $count = 1)
    {
    }

    /**
     * Add a relationship count / exists condition to the query.
     *
     * @param string $relation
     * @param string $boolean
     * @param \Closure|null $callback
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::doesntHave()
     */
    public static function doesntHave($relation, $boolean = 'and', Closure $callback = null)
    {
    }

    /**
     * Add a relationship count / exists condition to the query with an "or".
     *
     * @param string $relation
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::orDoesntHave()
     */
    public static function orDoesntHave($relation)
    {
    }

    /**
     * Add a relationship count / exists condition to the query with where clauses.
     *
     * @param string $relation
     * @param \Closure|null $callback
     * @param string $operator
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::whereHas()
     */
    public static function whereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)
    {
    }

    /**
     * Add a relationship count / exists condition to the query with where clauses and an "or".
     *
     * @param string $relation
     * @param \Closure $callback
     * @param string $operator
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::orWhereHas()
     */
    public static function orWhereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)
    {
    }

    /**
     * Add a relationship count / exists condition to the query with where clauses.
     *
     * @param string $relation
     * @param \Closure|null $callback
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::whereDoesntHave()
     */
    public static function whereDoesntHave($relation, Closure $callback = null)
    {
    }

    /**
     * Add a relationship count / exists condition to the query with where clauses and an "or".
     *
     * @param string $relation
     * @param \Closure $callback
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::orWhereDoesntHave()
     */
    public static function orWhereDoesntHave($relation, Closure $callback = null)
    {
    }

    /**
     * Add subselect queries to count the relations.
     *
     * @param mixed $relations
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::withCount()
     */
    public static function withCount($relations)
    {
    }

    /**
     * Add the "has" condition where clause to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $hasQuery
     * @param \Illuminate\Database\Eloquent\Relations\Relation $relation
     * @param string $operator
     * @param int $count
     * @param string $boolean
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::addHasWhere()
     */
    protected static function addHasWhere(\Illuminate\Database\Eloquent\Builder $hasQuery, Relation $relation, $operator, $count, $boolean)
    {
    }

    /**
     * Merge the where constraints from another query to the current query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $from
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::mergeConstraintsFrom()
     */
    public static function mergeConstraintsFrom(\Illuminate\Database\Eloquent\Builder $from)
    {
    }

    /**
     * Add a sub-query count clause to this query.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $operator
     * @param int $count
     * @param string $boolean
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Builder::addWhereCountQuery()
     */
    protected static function addWhereCountQuery(Builder $query, $operator = '>=', $count = 1, $boolean = 'and')
    {
    }

    /**
     * Get the "has relation" base query instance.
     *
     * @param string $relation
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     * @see \Illuminate\Database\Eloquent\Builder::getRelationWithoutConstraints()
     */
    protected static function getRelationWithoutConstraints($relation)
    {
    }

    /**
     * Check if we can run an "exists" query to optimize performance.
     *
     * @param string $operator
     * @param int $count
     * @return bool
     * @see \Illuminate\Database\Eloquent\Builder::canUseExistsForExistenceCheck()
     */
    protected static function canUseExistsForExistenceCheck($operator, $count)
    {
    }

    /**
     * Set the columns to be selected.
     *
     * @param array|mixed $columns
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::select()
     */
    public static function select($columns = ['*'])
    {
    }

    /**
     * Add a new "raw" select expression to the query.
     *
     * @param string $expression
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::selectRaw()
     */
    public static function selectRaw($expression, array $bindings = [])
    {
    }

    /**
     * Add a subselect expression to the query.
     *
     * @param \Closure|\Illuminate\Database\Query\Builder|string $query
     * @param string $as
     * @return \Illuminate\Database\Query\Builder|static
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Database\Query\Builder::selectSub()
     */
    public static function selectSub($query, $as)
    {
    }

    /**
     * Parse the sub-select query into SQL and bindings.
     *
     * @param mixed $query
     * @return array
     * @see \Illuminate\Database\Query\Builder::parseSubSelect()
     */
    protected static function parseSubSelect($query)
    {
    }

    /**
     * Add a new select column to the query.
     *
     * @param array|mixed $column
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::addSelect()
     */
    public static function addSelect($column)
    {
    }

    /**
     * Force the query to only return distinct results.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::distinct()
     */
    public static function distinct()
    {
    }

    /**
     * Set the table which the query is targeting.
     *
     * @param string $table
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::from()
     */
    public static function from($table)
    {
    }

    /**
     * Add a join clause to the query.
     *
     * @param string $table
     * @param string $first
     * @param string|null $operator
     * @param string|null $second
     * @param string $type
     * @param bool $where
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::join()
     */
    public static function join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
    {
    }

    /**
     * Add a "join where" clause to the query.
     *
     * @param string $table
     * @param string $first
     * @param string $operator
     * @param string $second
     * @param string $type
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::joinWhere()
     */
    public static function joinWhere($table, $first, $operator, $second, $type = 'inner')
    {
    }

    /**
     * Add a left join to the query.
     *
     * @param string $table
     * @param string $first
     * @param string|null $operator
     * @param string|null $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::leftJoin()
     */
    public static function leftJoin($table, $first, $operator = null, $second = null)
    {
    }

    /**
     * Add a "join where" clause to the query.
     *
     * @param string $table
     * @param string $first
     * @param string $operator
     * @param string $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::leftJoinWhere()
     */
    public static function leftJoinWhere($table, $first, $operator, $second)
    {
    }

    /**
     * Add a right join to the query.
     *
     * @param string $table
     * @param string $first
     * @param string|null $operator
     * @param string|null $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::rightJoin()
     */
    public static function rightJoin($table, $first, $operator = null, $second = null)
    {
    }

    /**
     * Add a "right join where" clause to the query.
     *
     * @param string $table
     * @param string $first
     * @param string $operator
     * @param string $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::rightJoinWhere()
     */
    public static function rightJoinWhere($table, $first, $operator, $second)
    {
    }

    /**
     * Add a "cross join" clause to the query.
     *
     * @param string $table
     * @param string|null $first
     * @param string|null $operator
     * @param string|null $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::crossJoin()
     */
    public static function crossJoin($table, $first = null, $operator = null, $second = null)
    {
    }

    /**
     * Merge an array of where clauses and bindings.
     *
     * @param array $wheres
     * @param array $bindings
     * @return null
     * @see \Illuminate\Database\Query\Builder::mergeWheres()
     */
    public static function mergeWheres($wheres, $bindings)
    {
    }

    /**
     * Add an array of where clauses to the query.
     *
     * @param array $column
     * @param string $boolean
     * @param string $method
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::addArrayOfWheres()
     */
    protected static function addArrayOfWheres($column, $boolean, $method = 'where')
    {
    }

    /**
     * Prepare the value and operator for a where clause.
     *
     * @param string $value
     * @param string $operator
     * @param bool $useDefault
     * @return array
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Database\Query\Builder::prepareValueAndOperator()
     */
    protected static function prepareValueAndOperator($value, $operator, $useDefault = false)
    {
    }

    /**
     * Determine if the given operator and value combination is legal.
     *
     * Prevents using Null values with invalid operators.
     *
     * @param string $operator
     * @param mixed $value
     * @return bool
     * @see \Illuminate\Database\Query\Builder::invalidOperatorAndValue()
     */
    protected static function invalidOperatorAndValue($operator, $value)
    {
    }

    /**
     * Determine if the given operator is supported.
     *
     * @param string $operator
     * @return bool
     * @see \Illuminate\Database\Query\Builder::invalidOperator()
     */
    protected static function invalidOperator($operator)
    {
    }

    /**
     * Add a "where" clause comparing two columns to the query.
     *
     * @param string|array $first
     * @param string|null $operator
     * @param string|null $second
     * @param string|null $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereColumn()
     */
    public static function whereColumn($first, $operator = null, $second = null, $boolean = 'and')
    {
    }

    /**
     * Add an "or where" clause comparing two columns to the query.
     *
     * @param string|array $first
     * @param string|null $operator
     * @param string|null $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereColumn()
     */
    public static function orWhereColumn($first, $operator = null, $second = null)
    {
    }

    /**
     * Add a raw where clause to the query.
     *
     * @param string $sql
     * @param mixed $bindings
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereRaw()
     */
    public static function whereRaw($sql, $bindings = [], $boolean = 'and')
    {
    }

    /**
     * Add a raw or where clause to the query.
     *
     * @param string $sql
     * @param mixed $bindings
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereRaw()
     */
    public static function orWhereRaw($sql, $bindings = [])
    {
    }

    /**
     * Add a "where in" clause to the query.
     *
     * @param string $column
     * @param mixed $values
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereIn()
     */
    public static function whereIn($column, $values, $boolean = 'and', $not = false)
    {
    }

    /**
     * Add an "or where in" clause to the query.
     *
     * @param string $column
     * @param mixed $values
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereIn()
     */
    public static function orWhereIn($column, $values)
    {
    }

    /**
     * Add a "where not in" clause to the query.
     *
     * @param string $column
     * @param mixed $values
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereNotIn()
     */
    public static function whereNotIn($column, $values, $boolean = 'and')
    {
    }

    /**
     * Add an "or where not in" clause to the query.
     *
     * @param string $column
     * @param mixed $values
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereNotIn()
     */
    public static function orWhereNotIn($column, $values)
    {
    }

    /**
     * Add a where in with a sub-select to the query.
     *
     * @param string $column
     * @param \Closure $callback
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereInSub()
     */
    protected static function whereInSub($column, Closure $callback, $boolean, $not)
    {
    }

    /**
     * Add an external sub-select to the query.
     *
     * @param string $column
     * @param \Illuminate\Database\Query\Builder|static $query
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereInExistingQuery()
     */
    protected static function whereInExistingQuery($column, $query, $boolean, $not)
    {
    }

    /**
     * Add a "where null" clause to the query.
     *
     * @param string $column
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereNull()
     */
    public static function whereNull($column, $boolean = 'and', $not = false)
    {
    }

    /**
     * Add an "or where null" clause to the query.
     *
     * @param string $column
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereNull()
     */
    public static function orWhereNull($column)
    {
    }

    /**
     * Add a "where not null" clause to the query.
     *
     * @param string $column
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereNotNull()
     */
    public static function whereNotNull($column, $boolean = 'and')
    {
    }

    /**
     * Add a where between statement to the query.
     *
     * @param string $column
     * @param array $values
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereBetween()
     */
    public static function whereBetween($column, array $values, $boolean = 'and', $not = false)
    {
    }

    /**
     * Add an or where between statement to the query.
     *
     * @param string $column
     * @param array $values
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereBetween()
     */
    public static function orWhereBetween($column, array $values)
    {
    }

    /**
     * Add a where not between statement to the query.
     *
     * @param string $column
     * @param array $values
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereNotBetween()
     */
    public static function whereNotBetween($column, array $values, $boolean = 'and')
    {
    }

    /**
     * Add an or where not between statement to the query.
     *
     * @param string $column
     * @param array $values
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereNotBetween()
     */
    public static function orWhereNotBetween($column, array $values)
    {
    }

    /**
     * Add an "or where not null" clause to the query.
     *
     * @param string $column
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereNotNull()
     */
    public static function orWhereNotNull($column)
    {
    }

    /**
     * Add a "where date" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param mixed $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereDate()
     */
    public static function whereDate($column, $operator, $value = null, $boolean = 'and')
    {
    }

    /**
     * Add an "or where date" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereDate()
     */
    public static function orWhereDate($column, $operator, $value)
    {
    }

    /**
     * Add a "where time" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param int $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereTime()
     */
    public static function whereTime($column, $operator, $value, $boolean = 'and')
    {
    }

    /**
     * Add an "or where time" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param int $value
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereTime()
     */
    public static function orWhereTime($column, $operator, $value)
    {
    }

    /**
     * Add a "where day" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param mixed $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereDay()
     */
    public static function whereDay($column, $operator, $value = null, $boolean = 'and')
    {
    }

    /**
     * Add a "where month" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param mixed $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereMonth()
     */
    public static function whereMonth($column, $operator, $value = null, $boolean = 'and')
    {
    }

    /**
     * Add a "where year" statement to the query.
     *
     * @param string $column
     * @param string $operator
     * @param mixed $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereYear()
     */
    public static function whereYear($column, $operator, $value = null, $boolean = 'and')
    {
    }

    /**
     * Add a date based (year, month, day, time) statement to the query.
     *
     * @param string $type
     * @param string $column
     * @param string $operator
     * @param int $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::addDateBasedWhere()
     */
    protected static function addDateBasedWhere($type, $column, $operator, $value, $boolean = 'and')
    {
    }

    /**
     * Add a nested where statement to the query.
     *
     * @param \Closure $callback
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereNested()
     */
    public static function whereNested(Closure $callback, $boolean = 'and')
    {
    }

    /**
     * Create a new query instance for nested where condition.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::forNestedWhere()
     */
    public static function forNestedWhere()
    {
    }

    /**
     * Add another query builder as a nested where to the query builder.
     *
     * @param \Illuminate\Database\Query\Builder|static $query
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::addNestedWhereQuery()
     */
    public static function addNestedWhereQuery($query, $boolean = 'and')
    {
    }

    /**
     * Add a full sub-select to the query.
     *
     * @param string $column
     * @param string $operator
     * @param \Closure $callback
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereSub()
     */
    protected static function whereSub($column, $operator, Closure $callback, $boolean)
    {
    }

    /**
     * Add an exists clause to the query.
     *
     * @param \Closure $callback
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::whereExists()
     */
    public static function whereExists(Closure $callback, $boolean = 'and', $not = false)
    {
    }

    /**
     * Add an or exists clause to the query.
     *
     * @param \Closure $callback
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereExists()
     */
    public static function orWhereExists(Closure $callback, $not = false)
    {
    }

    /**
     * Add a where not exists clause to the query.
     *
     * @param \Closure $callback
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::whereNotExists()
     */
    public static function whereNotExists(Closure $callback, $boolean = 'and')
    {
    }

    /**
     * Add a where not exists clause to the query.
     *
     * @param \Closure $callback
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereNotExists()
     */
    public static function orWhereNotExists(Closure $callback)
    {
    }

    /**
     * Add an exists clause to the query.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $boolean
     * @param bool $not
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::addWhereExistsQuery()
     */
    public static function addWhereExistsQuery(self $query, $boolean = 'and', $not = false)
    {
    }

    /**
     * Handles dynamic "where" clauses to the query.
     *
     * @param string $method
     * @param string $parameters
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::dynamicWhere()
     */
    public static function dynamicWhere($method, $parameters)
    {
    }

    /**
     * Add a single dynamic where clause statement to the query.
     *
     * @param string $segment
     * @param string $connector
     * @param array $parameters
     * @param int $index
     * @return null
     * @see \Illuminate\Database\Query\Builder::addDynamic()
     */
    protected static function addDynamic($segment, $connector, $parameters, $index)
    {
    }

    /**
     * Add a "group by" clause to the query.
     *
     * @param array ...$groups
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::groupBy()
     */
    public static function groupBy($groups)
    {
    }

    /**
     * Add a "having" clause to the query.
     *
     * @param string $column
     * @param string|null $operator
     * @param string|null $value
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::having()
     */
    public static function having($column, $operator = null, $value = null, $boolean = 'and')
    {
    }

    /**
     * Add a "or having" clause to the query.
     *
     * @param string $column
     * @param string|null $operator
     * @param string|null $value
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orHaving()
     */
    public static function orHaving($column, $operator = null, $value = null)
    {
    }

    /**
     * Add a raw having clause to the query.
     *
     * @param string $sql
     * @param array $bindings
     * @param string $boolean
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::havingRaw()
     */
    public static function havingRaw($sql, array $bindings = [], $boolean = 'and')
    {
    }

    /**
     * Add a raw or having clause to the query.
     *
     * @param string $sql
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orHavingRaw()
     */
    public static function orHavingRaw($sql, array $bindings = [])
    {
    }

    /**
     * Add an "order by" clause to the query.
     *
     * @param string $column
     * @param string $direction
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::orderBy()
     */
    public static function orderBy($column, $direction = 'asc')
    {
    }

    /**
     * Add a descending "order by" clause to the query.
     *
     * @param string $column
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::orderByDesc()
     */
    public static function orderByDesc($column)
    {
    }

    /**
     * Add an "order by" clause for a timestamp to the query.
     *
     * @param string $column
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::latest()
     */
    public static function latest($column = 'created_at')
    {
    }

    /**
     * Add an "order by" clause for a timestamp to the query.
     *
     * @param string $column
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::oldest()
     */
    public static function oldest($column = 'created_at')
    {
    }

    /**
     * Put the query's results in random order.
     *
     * @param string $seed
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::inRandomOrder()
     */
    public static function inRandomOrder($seed = '')
    {
    }

    /**
     * Add a raw "order by" clause to the query.
     *
     * @param string $sql
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::orderByRaw()
     */
    public static function orderByRaw($sql, $bindings = [])
    {
    }

    /**
     * Alias to set the "offset" value of the query.
     *
     * @param int $value
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::skip()
     */
    public static function skip($value)
    {
    }

    /**
     * Set the "offset" value of the query.
     *
     * @param int $value
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::offset()
     */
    public static function offset($value)
    {
    }

    /**
     * Alias to set the "limit" value of the query.
     *
     * @param int $value
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::take()
     */
    public static function take($value)
    {
    }

    /**
     * Set the "limit" value of the query.
     *
     * @param int $value
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::limit()
     */
    public static function limit($value)
    {
    }

    /**
     * Set the limit and offset for a given page.
     *
     * @param int $page
     * @param int $perPage
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::forPage()
     */
    public static function forPage($page, $perPage = 15)
    {
    }

    /**
     * Constrain the query to the next "page" of results after a given ID.
     *
     * @param int $perPage
     * @param int $lastId
     * @param string $column
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::forPageAfterId()
     */
    public static function forPageAfterId($perPage = 15, $lastId = 0, $column = 'id')
    {
    }

    /**
     * Get an array with all orders with a given column removed.
     *
     * @param string $column
     * @return array
     * @see \Illuminate\Database\Query\Builder::removeExistingOrdersFor()
     */
    protected static function removeExistingOrdersFor($column)
    {
    }

    /**
     * Add a union statement to the query.
     *
     * @param \Illuminate\Database\Query\Builder|\Closure $query
     * @param bool $all
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::union()
     */
    public static function union($query, $all = false)
    {
    }

    /**
     * Add a union all statement to the query.
     *
     * @param \Illuminate\Database\Query\Builder|\Closure $query
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::unionAll()
     */
    public static function unionAll($query)
    {
    }

    /**
     * Lock the selected rows in the table.
     *
     * @param string|bool $value
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::lock()
     */
    public static function lock($value = true)
    {
    }

    /**
     * Lock the selected rows in the table for updating.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::lockForUpdate()
     */
    public static function lockForUpdate()
    {
    }

    /**
     * Share lock the selected rows in the table.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::sharedLock()
     */
    public static function sharedLock()
    {
    }

    /**
     * Get the SQL representation of the query.
     *
     * @return string
     * @see \Illuminate\Database\Query\Builder::toSql()
     */
    public static function toSql()
    {
    }

    /**
     * Run the query as a "select" statement against the connection.
     *
     * @return array
     * @see \Illuminate\Database\Query\Builder::runSelect()
     */
    protected static function runSelect()
    {
    }

    /**
     * Get the count of the total records for the paginator.
     *
     * @param array $columns
     * @return int
     * @see \Illuminate\Database\Query\Builder::getCountForPagination()
     */
    public static function getCountForPagination($columns = ['*'])
    {
    }

    /**
     * Run a pagination count query.
     *
     * @param array $columns
     * @return array
     * @see \Illuminate\Database\Query\Builder::runPaginationCountQuery()
     */
    protected static function runPaginationCountQuery($columns = ['*'])
    {
    }

    /**
     * Remove the column aliases since they will break count queries.
     *
     * @param array $columns
     * @return array
     * @see \Illuminate\Database\Query\Builder::withoutSelectAliases()
     */
    protected static function withoutSelectAliases(array $columns)
    {
    }

    /**
     * Strip off the table name or alias from a column identifier.
     *
     * @param string $column
     * @return string|null
     * @see \Illuminate\Database\Query\Builder::stripTableForPluck()
     */
    protected static function stripTableForPluck($column)
    {
    }

    /**
     * Concatenate values of a given column as a string.
     *
     * @param string $column
     * @param string $glue
     * @return string
     * @see \Illuminate\Database\Query\Builder::implode()
     */
    public static function implode($column, $glue = '')
    {
    }

    /**
     * Determine if any rows exist for the current query.
     *
     * @return bool
     * @see \Illuminate\Database\Query\Builder::exists()
     */
    public static function exists()
    {
    }

    /**
     * Retrieve the "count" result of the query.
     *
     * @param string $columns
     * @return int
     * @see \Illuminate\Database\Query\Builder::count()
     */
    public static function count($columns = '*')
    {
    }

    /**
     * Retrieve the minimum value of a given column.
     *
     * @param string $column
     * @return mixed
     * @see \Illuminate\Database\Query\Builder::min()
     */
    public static function min($column)
    {
    }

    /**
     * Retrieve the maximum value of a given column.
     *
     * @param string $column
     * @return mixed
     * @see \Illuminate\Database\Query\Builder::max()
     */
    public static function max($column)
    {
    }

    /**
     * Retrieve the sum of the values of a given column.
     *
     * @param string $column
     * @return mixed
     * @see \Illuminate\Database\Query\Builder::sum()
     */
    public static function sum($column)
    {
    }

    /**
     * Retrieve the average of the values of a given column.
     *
     * @param string $column
     * @return mixed
     * @see \Illuminate\Database\Query\Builder::avg()
     */
    public static function avg($column)
    {
    }

    /**
     * Alias for the "avg" method.
     *
     * @param string $column
     * @return mixed
     * @see \Illuminate\Database\Query\Builder::average()
     */
    public static function average($column)
    {
    }

    /**
     * Execute an aggregate function on the database.
     *
     * @param string $function
     * @param array $columns
     * @return mixed
     * @see \Illuminate\Database\Query\Builder::aggregate()
     */
    public static function aggregate($function, $columns = ['*'])
    {
    }

    /**
     * Execute a numeric aggregate function on the database.
     *
     * @param string $function
     * @param array $columns
     * @return float|int
     * @see \Illuminate\Database\Query\Builder::numericAggregate()
     */
    public static function numericAggregate($function, $columns = ['*'])
    {
    }

    /**
     * Set the aggregate property without running the query.
     *
     * @param string $function
     * @param array $columns
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::setAggregate()
     */
    protected static function setAggregate($function, $columns)
    {
    }

    /**
     * Insert a new record into the database.
     *
     * @param array $values
     * @return bool
     * @see \Illuminate\Database\Query\Builder::insert()
     */
    public static function insert(array $values)
    {
    }

    /**
     * Insert a new record and get the value of the primary key.
     *
     * @param array $values
     * @param string|null $sequence
     * @return int
     * @see \Illuminate\Database\Query\Builder::insertGetId()
     */
    public static function insertGetId(array $values, $sequence = null)
    {
    }

    /**
     * Insert or update a record matching the attributes, and fill it with values.
     *
     * @param array $attributes
     * @param array $values
     * @return bool
     * @see \Illuminate\Database\Query\Builder::updateOrInsert()
     */
    public static function updateOrInsert(array $attributes, array $values = [])
    {
    }

    /**
     * Run a truncate statement on the table.
     *
     * @return null
     * @see \Illuminate\Database\Query\Builder::truncate()
     */
    public static function truncate()
    {
    }

    /**
     * Get a new instance of the query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::newQuery()
     */
    public static function newQuery()
    {
    }

    /**
     * Create a new query instance for a sub-query.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::forSubQuery()
     */
    protected static function forSubQuery()
    {
    }

    /**
     * Create a raw database expression.
     *
     * @param mixed $value
     * @return \Illuminate\Database\Query\Expression
     * @see \Illuminate\Database\Query\Builder::raw()
     */
    public static function raw($value)
    {
    }

    /**
     * Get the current query value bindings in a flattened array.
     *
     * @return array
     * @see \Illuminate\Database\Query\Builder::getBindings()
     */
    public static function getBindings()
    {
    }

    /**
     * Get the raw array of bindings.
     *
     * @return array
     * @see \Illuminate\Database\Query\Builder::getRawBindings()
     */
    public static function getRawBindings()
    {
    }

    /**
     * Set the bindings on the query builder.
     *
     * @param array $bindings
     * @param string $type
     * @return \Illuminate\Database\Query\Builder
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Database\Query\Builder::setBindings()
     */
    public static function setBindings(array $bindings, $type = 'where')
    {
    }

    /**
     * Add a binding to the query.
     *
     * @param mixed $value
     * @param string $type
     * @return \Illuminate\Database\Query\Builder
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Database\Query\Builder::addBinding()
     */
    public static function addBinding($value, $type = 'where')
    {
    }

    /**
     * Merge an array of bindings into our bindings.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::mergeBindings()
     */
    public static function mergeBindings(self $query)
    {
    }

    /**
     * Remove all of the expressions from a list of bindings.
     *
     * @param array $bindings
     * @return array
     * @see \Illuminate\Database\Query\Builder::cleanBindings()
     */
    protected static function cleanBindings(array $bindings)
    {
    }

    /**
     * Get the database connection instance.
     *
     * @return \Illuminate\Database\ConnectionInterface
     * @see \Illuminate\Database\Query\Builder::getConnection()
     */
    public static function getConnection()
    {
    }

    /**
     * Get the database query processor instance.
     *
     * @return \Illuminate\Database\Query\Processors\Processor
     * @see \Illuminate\Database\Query\Builder::getProcessor()
     */
    public static function getProcessor()
    {
    }

    /**
     * Get the query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\Grammar
     * @see \Illuminate\Database\Query\Builder::getGrammar()
     */
    public static function getGrammar()
    {
    }

    /**
     * Use the write pdo for query.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::useWritePdo()
     */
    public static function useWritePdo()
    {
    }

    /**
     * Clone the query without the given properties.
     *
     * @param array $properties
     * @return static
     * @see \Illuminate\Database\Query\Builder::cloneWithout()
     */
    public static function cloneWithout(array $properties)
    {
    }

    /**
     * Clone the query without the given bindings.
     *
     * @param array $except
     * @return static
     * @see \Illuminate\Database\Query\Builder::cloneWithoutBindings()
     */
    public static function cloneWithoutBindings(array $except)
    {
    }

    /**
     * Register a custom macro.
     *
     * @param string $name
     * @param object|callable $macro
     *
     * @return null
     * @see \Illuminate\Database\Query\Builder::macro()
     */
    public static function macro($name, $macro)
    {
    }

    /**
     * Mix another object into the class.
     *
     * @param object $mixin
     * @return null
     * @see \Illuminate\Database\Query\Builder::mixin()
     */
    public static function mixin($mixin)
    {
    }

    /**
     * Checks if macro is registered.
     *
     * @param string $name
     * @return bool
     * @see \Illuminate\Database\Query\Builder::hasMacro()
     */
    public static function hasMacro($name)
    {
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     * @see \Illuminate\Database\Query\Builder::macroCall()
     */
    public static function macroCall($method, $parameters)
    {
    }

}