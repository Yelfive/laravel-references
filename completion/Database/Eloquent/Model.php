<?php

namespace Illuminate\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\ConnectionResolverInterface;
use DateTimeInterface;
use Illuminate\Contracts\Events\Dispatcher;
use Closure;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;


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
    protected $events;

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
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     * 
     * @see \Illuminate\Database\Eloquent\Model::__construct()
     */
    public function __construct(array $attributes = [])
    {
    }

    /**
     * Check if the model needs to be booted and if so, do it.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::bootIfNotBooted()
     */
    protected function bootIfNotBooted()
    {
    }

    /**
     * The "booting" method of the model.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::boot()
     */
    protected static function boot()
    {
    }

    /**
     * Boot all of the bootable traits on the model.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::bootTraits()
     */
    protected static function bootTraits()
    {
    }

    /**
     * Clear the list of booted models so they will be re-booted.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::clearBootedModels()
     */
    public static function clearBootedModels()
    {
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @param array $attributes
     * @return $this
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     * @see \Illuminate\Database\Eloquent\Model::fill()
     */
    public function fill(array $attributes)
    {
    }

    /**
     * Fill the model with an array of attributes. Force mass assignment.
     *
     * @param array $attributes
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::forceFill()
     */
    public function forceFill(array $attributes)
    {
    }

    /**
     * Remove the table name from a given key.
     *
     * @param string $key
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::removeTableFromKey()
     */
    protected function removeTableFromKey($key)
    {
    }

    /**
     * Create a new instance of the given model.
     *
     * @param array $attributes
     * @param bool $exists
     * @return static
     * @see \Illuminate\Database\Eloquent\Model::newInstance()
     */
    public function newInstance($attributes = [], $exists = false)
    {
    }

    /**
     * Create a new model instance that is existing.
     *
     * @param array $attributes
     * @param string|null $connection
     * @return static
     * @see \Illuminate\Database\Eloquent\Model::newFromBuilder()
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
    }

    /**
     * Begin querying the model on a given connection.
     *
     * @param string|null $connection
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::on()
     */
    public static function on($connection = null)
    {
    }

    /**
     * Begin querying the model on the write connection.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Eloquent\Model::onWriteConnection()
     */
    public static function onWriteConnection()
    {
    }

    /**
     * Get all of the models from the database.
     *
     * @param array|mixed $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @see \Illuminate\Database\Eloquent\Model::all()
     */
    public static function all($columns = ['*'])
    {
    }

    /**
     * Begin querying a model with eager loading.
     *
     * @param array|string $relations
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Model::with()
     */
    public static function with($relations)
    {
    }

    /**
     * Eager load relations on the model.
     *
     * @param array|string $relations
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::load()
     */
    public function load($relations)
    {
    }

    /**
     * Increment a column's value by a given amount.
     *
     * @param string $column
     * @param int $amount
     * @param array $extra
     * @return int
     * @see \Illuminate\Database\Eloquent\Model::increment()
     */
    protected function increment($column, $amount = 1, array $extra = [])
    {
    }

    /**
     * Decrement a column's value by a given amount.
     *
     * @param string $column
     * @param int $amount
     * @param array $extra
     * @return int
     * @see \Illuminate\Database\Eloquent\Model::decrement()
     */
    protected function decrement($column, $amount = 1, array $extra = [])
    {
    }

    /**
     * Run the increment or decrement method on the model.
     *
     * @param string $column
     * @param int $amount
     * @param array $extra
     * @param string $method
     * @return int
     * @see \Illuminate\Database\Eloquent\Model::incrementOrDecrement()
     */
    protected function incrementOrDecrement($column, $amount, $extra, $method)
    {
    }

    /**
     * Increment the underlying attribute value and sync with original.
     *
     * @param string $column
     * @param int $amount
     * @param array $extra
     * @param string $method
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::incrementOrDecrementAttributeValue()
     */
    protected function incrementOrDecrementAttributeValue($column, $amount, $extra, $method)
    {
    }

    /**
     * Update the model in the database.
     *
     * @param array $attributes
     * @param array $options
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::update()
     */
    public function update(array $attributes = [], array $options = [])
    {
    }

    /**
     * Save the model and all of its relationships.
     *
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::push()
     */
    public function push()
    {
    }

    /**
     * Save the model to the database.
     *
     * @param array $options
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::save()
     */
    public function save(array $options = [])
    {
    }

    /**
     * Save the model to the database using transaction.
     *
     * @param array $options
     * @return bool
     *
     * @throws \Throwable
     * @see \Illuminate\Database\Eloquent\Model::saveOrFail()
     */
    public function saveOrFail(array $options = [])
    {
    }

    /**
     * Perform any actions that are necessary after the model is saved.
     *
     * @param array $options
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::finishSave()
     */
    protected function finishSave(array $options)
    {
    }

    /**
     * Perform a model update operation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::performUpdate()
     */
    protected function performUpdate(Builder $query)
    {
    }

    /**
     * Set the keys for a save update query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::setKeysForSaveQuery()
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
    }

    /**
     * Get the primary key value for a save query.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getKeyForSaveQuery()
     */
    protected function getKeyForSaveQuery()
    {
    }

    /**
     * Perform a model insert operation.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::performInsert()
     */
    protected function performInsert(Builder $query)
    {
    }

    /**
     * Insert the given attributes and set the ID on the model.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $attributes
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::insertAndSetId()
     */
    protected function insertAndSetId(Builder $query, $attributes)
    {
    }

    /**
     * Destroy the models for the given IDs.
     *
     * @param array|int $ids
     * @return int
     * @see \Illuminate\Database\Eloquent\Model::destroy()
     */
    public static function destroy($ids)
    {
    }

    /**
     * Delete the model from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     * @see \Illuminate\Database\Eloquent\Model::delete()
     */
    public function delete()
    {
    }

    /**
     * Force a hard delete on a soft deleted model.
     *
     * This method protects developers from running forceDelete when trait is missing.
     *
     * @return bool|null
     * @see \Illuminate\Database\Eloquent\Model::forceDelete()
     */
    public function forceDelete()
    {
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::performDeleteOnModel()
     */
    protected function performDeleteOnModel()
    {
    }

    /**
     * Begin querying the model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::query()
     */
    public static function query()
    {
    }

    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::newQuery()
     */
    public function newQuery()
    {
    }

    /**
     * Get a new query builder that doesn't have any global scopes.
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Model::newQueryWithoutScopes()
     */
    public function newQueryWithoutScopes()
    {
    }

    /**
     * Get a new query instance without a given scope.
     *
     * @param \Illuminate\Database\Eloquent\Scope|string $scope
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::newQueryWithoutScope()
     */
    public function newQueryWithoutScope($scope)
    {
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Model::newEloquentBuilder()
     */
    public function newEloquentBuilder($query)
    {
    }

    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Eloquent\Model::newBaseQueryBuilder()
     */
    protected function newBaseQueryBuilder()
    {
    }

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array $models
     * @return \Illuminate\Database\Eloquent\Collection
     * @see \Illuminate\Database\Eloquent\Model::newCollection()
     */
    public function newCollection(array $models = [])
    {
    }

    /**
     * Create a new pivot model instance.
     *
     * @param \Illuminate\Database\Eloquent\Model $parent
     * @param array $attributes
     * @param string $table
     * @param bool $exists
     * @param string|null $using
     * @return \Illuminate\Database\Eloquent\Relations\Pivot
     * @see \Illuminate\Database\Eloquent\Model::newPivot()
     */
    public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists, $using = null)
    {
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::toArray()
     */
    public function toArray()
    {
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param int $options
     * @return string
     *
     * @throws \Illuminate\Database\Eloquent\JsonEncodingException
     * @see \Illuminate\Database\Eloquent\Model::toJson()
     */
    public function toJson($options = 0)
    {
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::jsonSerialize()
     */
    public function jsonSerialize()
    {
    }

    /**
     * Reload a fresh model instance from the database.
     *
     * @param array|string $with
     * @return static|null
     * @see \Illuminate\Database\Eloquent\Model::fresh()
     */
    public function fresh($with = [])
    {
    }

    /**
     * Clone the model into a new, non-existing instance.
     *
     * @param array|null $except
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::replicate()
     */
    public function replicate(array $except = null)
    {
    }

    /**
     * Determine if two models have the same ID and belong to the same table.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::is()
     */
    public function is(\Illuminate\Database\Eloquent\Model $model)
    {
    }

    /**
     * Get the database connection for the model.
     *
     * @return \Illuminate\Database\Connection
     * @see \Illuminate\Database\Eloquent\Model::getConnection()
     */
    public function getConnection()
    {
    }

    /**
     * Get the current connection name for the model.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getConnectionName()
     */
    public function getConnectionName()
    {
    }

    /**
     * Set the connection associated with the model.
     *
     * @param string $name
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setConnection()
     */
    public function setConnection($name)
    {
    }

    /**
     * Resolve a connection instance.
     *
     * @param string|null $connection
     * @return \Illuminate\Database\Connection
     * @see \Illuminate\Database\Eloquent\Model::resolveConnection()
     */
    public static function resolveConnection($connection = null)
    {
    }

    /**
     * Get the connection resolver instance.
     *
     * @return \Illuminate\Database\ConnectionResolverInterface
     * @see \Illuminate\Database\Eloquent\Model::getConnectionResolver()
     */
    public static function getConnectionResolver()
    {
    }

    /**
     * Set the connection resolver instance.
     *
     * @param \Illuminate\Database\ConnectionResolverInterface $resolver
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::setConnectionResolver()
     */
    public static function setConnectionResolver(ConnectionResolverInterface $resolver)
    {
    }

    /**
     * Unset the connection resolver for models.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::unsetConnectionResolver()
     */
    public static function unsetConnectionResolver()
    {
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getTable()
     */
    public function getTable()
    {
    }

    /**
     * Set the table associated with the model.
     *
     * @param string $table
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setTable()
     */
    public function setTable($table)
    {
    }

    /**
     * Get the primary key for the model.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getKeyName()
     */
    public function getKeyName()
    {
    }

    /**
     * Set the primary key for the model.
     *
     * @param string $key
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setKeyName()
     */
    public function setKeyName($key)
    {
    }

    /**
     * Get the table qualified key name.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getQualifiedKeyName()
     */
    public function getQualifiedKeyName()
    {
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getKeyType()
     */
    public function getKeyType()
    {
    }

    /**
     * Set the data type for the primary key.
     *
     * @param string $type
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setKeyType()
     */
    public function setKeyType($type)
    {
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::getIncrementing()
     */
    public function getIncrementing()
    {
    }

    /**
     * Set whether IDs are incrementing.
     *
     * @param bool $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setIncrementing()
     */
    public function setIncrementing($value)
    {
    }

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getKey()
     */
    public function getKey()
    {
    }

    /**
     * Get the queueable identity for the entity.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getQueueableId()
     */
    public function getQueueableId()
    {
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getRouteKey()
     */
    public function getRouteKey()
    {
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getRouteKeyName()
     */
    public function getRouteKeyName()
    {
    }

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getForeignKey()
     */
    public function getForeignKey()
    {
    }

    /**
     * Get the number of models to return per page.
     *
     * @return int
     * @see \Illuminate\Database\Eloquent\Model::getPerPage()
     */
    public function getPerPage()
    {
    }

    /**
     * Set the number of models to return per page.
     *
     * @param int $perPage
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setPerPage()
     */
    public function setPerPage($perPage)
    {
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param mixed $offset
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::offsetExists()
     */
    public function offsetExists($offset)
    {
    }

    /**
     * Get the value for a given offset.
     *
     * @param mixed $offset
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::offsetGet()
     */
    public function offsetGet($offset)
    {
    }

    /**
     * Set the value for a given offset.
     *
     * @param mixed $offset
     * @param mixed $value
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::offsetSet()
     */
    public function offsetSet($offset, $value)
    {
    }

    /**
     * Unset the value for a given offset.
     *
     * @param mixed $offset
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::offsetUnset()
     */
    public function offsetUnset($offset)
    {
    }

    /**
     * Determine if an attribute or relation exists on the model.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::__isset()
     */
    public function __isset($key)
    {
    }

    /**
     * Unset an attribute on the model.
     *
     * @param string $key
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::__unset()
     */
    public function __unset($key)
    {
    }

    /**
     * When a model is being unserialized, check if it needs to be booted.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::__wakeup()
     */
    public function __wakeup()
    {
    }

    /**
     * Convert the model's attributes to an array.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::attributesToArray()
     */
    public function attributesToArray()
    {
    }

    /**
     * Add the date attributes to the attributes array.
     *
     * @param array $attributes
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::addDateAttributesToArray()
     */
    protected function addDateAttributesToArray(array $attributes)
    {
    }

    /**
     * Add the mutated attributes to the attributes array.
     *
     * @param array $attributes
     * @param array $mutatedAttributes
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::addMutatedAttributesToArray()
     */
    protected function addMutatedAttributesToArray(array $attributes, array $mutatedAttributes)
    {
    }

    /**
     * Add the casted attributes to the attributes array.
     *
     * @param array $attributes
     * @param array $mutatedAttributes
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::addCastAttributesToArray()
     */
    protected function addCastAttributesToArray(array $attributes, array $mutatedAttributes)
    {
    }

    /**
     * Get an attribute array of all arrayable attributes.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getArrayableAttributes()
     */
    protected function getArrayableAttributes()
    {
    }

    /**
     * Get all of the appendable values that are arrayable.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getArrayableAppends()
     */
    protected function getArrayableAppends()
    {
    }

    /**
     * Get the model's relationships in array form.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::relationsToArray()
     */
    public function relationsToArray()
    {
    }

    /**
     * Get an attribute array of all arrayable relations.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getArrayableRelations()
     */
    protected function getArrayableRelations()
    {
    }

    /**
     * Get an attribute array of all arrayable values.
     *
     * @param array $values
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getArrayableItems()
     */
    protected function getArrayableItems(array $values)
    {
    }

    /**
     * Get an attribute from the model.
     *
     * @param string $key
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getAttribute()
     */
    public function getAttribute($key)
    {
    }

    /**
     * Get a plain attribute (not a relationship).
     *
     * @param string $key
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getAttributeValue()
     */
    public function getAttributeValue($key)
    {
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param string $key
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getAttributeFromArray()
     */
    protected function getAttributeFromArray($key)
    {
    }

    /**
     * Get a relationship.
     *
     * @param string $key
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getRelationValue()
     */
    public function getRelationValue($key)
    {
    }

    /**
     * Get a relationship value from a method.
     *
     * @param string $method
     * @return mixed
     *
     * @throws \LogicException
     * @see \Illuminate\Database\Eloquent\Model::getRelationshipFromMethod()
     */
    protected function getRelationshipFromMethod($method)
    {
    }

    /**
     * Determine if a get mutator exists for an attribute.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::hasGetMutator()
     */
    public function hasGetMutator($key)
    {
    }

    /**
     * Get the value of an attribute using its mutator.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::mutateAttribute()
     */
    protected function mutateAttribute($key, $value)
    {
    }

    /**
     * Get the value of an attribute using its mutator for array conversion.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::mutateAttributeForArray()
     */
    protected function mutateAttributeForArray($key, $value)
    {
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::castAttribute()
     */
    protected function castAttribute($key, $value)
    {
    }

    /**
     * Get the type of cast for a model attribute.
     *
     * @param string $key
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getCastType()
     */
    protected function getCastType($key)
    {
    }

    /**
     * Set a given attribute on the model.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setAttribute()
     */
    public function setAttribute($key, $value)
    {
    }

    /**
     * Determine if a set mutator exists for an attribute.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::hasSetMutator()
     */
    public function hasSetMutator($key)
    {
    }

    /**
     * Determine if the given attribute is a date or date castable.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isDateAttribute()
     */
    protected function isDateAttribute($key)
    {
    }

    /**
     * Set a given JSON attribute on the model.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::fillJsonAttribute()
     */
    public function fillJsonAttribute($key, $value)
    {
    }

    /**
     * Get an array attribute with the given key and value set.
     *
     * @param string $path
     * @param string $key
     * @param mixed $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::getArrayAttributeWithValue()
     */
    protected function getArrayAttributeWithValue($path, $key, $value)
    {
    }

    /**
     * Get an array attribute or return an empty array if it is not set.
     *
     * @param string $key
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getArrayAttributeByKey()
     */
    protected function getArrayAttributeByKey($key)
    {
    }

    /**
     * Cast the given attribute to JSON.
     *
     * @param string $key
     * @param mixed $value
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::castAttributeAsJson()
     */
    protected function castAttributeAsJson($key, $value)
    {
    }

    /**
     * Encode the given value as JSON.
     *
     * @param mixed $value
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::asJson()
     */
    protected function asJson($value)
    {
    }

    /**
     * Decode the given JSON back into an array or object.
     *
     * @param string $value
     * @param bool $asObject
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::fromJson()
     */
    public function fromJson($value, $asObject = false)
    {
    }

    /**
     * Return a timestamp as DateTime object with time set to 00:00:00.
     *
     * @param mixed $value
     * @return \Carbon\Carbon
     * @see \Illuminate\Database\Eloquent\Model::asDate()
     */
    protected function asDate($value)
    {
    }

    /**
     * Return a timestamp as DateTime object.
     *
     * @param mixed $value
     * @return \Carbon\Carbon
     * @see \Illuminate\Database\Eloquent\Model::asDateTime()
     */
    protected function asDateTime($value)
    {
    }

    /**
     * Determine if the given value is a standard date format.
     *
     * @param string $value
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isStandardDateFormat()
     */
    protected function isStandardDateFormat($value)
    {
    }

    /**
     * Convert a DateTime to a storable string.
     *
     * @param \DateTime|int $value
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::fromDateTime()
     */
    public function fromDateTime($value)
    {
    }

    /**
     * Return a timestamp as unix timestamp.
     *
     * @param mixed $value
     * @return int
     * @see \Illuminate\Database\Eloquent\Model::asTimestamp()
     */
    protected function asTimestamp($value)
    {
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param \DateTimeInterface $date
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::serializeDate()
     */
    protected function serializeDate(DateTimeInterface $date)
    {
    }

    /**
     * Get the attributes that should be converted to dates.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getDates()
     */
    public function getDates()
    {
    }

    /**
     * Get the format for database stored dates.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getDateFormat()
     */
    protected function getDateFormat()
    {
    }

    /**
     * Set the date format used by the model.
     *
     * @param string $format
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setDateFormat()
     */
    public function setDateFormat($format)
    {
    }

    /**
     * Determine whether an attribute should be cast to a native type.
     *
     * @param string $key
     * @param array|string|null $types
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::hasCast()
     */
    public function hasCast($key, $types = null)
    {
    }

    /**
     * Get the casts array.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getCasts()
     */
    public function getCasts()
    {
    }

    /**
     * Determine whether a value is Date / DateTime castable for inbound manipulation.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isDateCastable()
     */
    protected function isDateCastable($key)
    {
    }

    /**
     * Determine whether a value is JSON castable for inbound manipulation.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isJsonCastable()
     */
    protected function isJsonCastable($key)
    {
    }

    /**
     * Get all of the current attributes on the model.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getAttributes()
     */
    public function getAttributes()
    {
    }

    /**
     * Set the array of model attributes. No checking is done.
     *
     * @param array $attributes
     * @param bool $sync
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setRawAttributes()
     */
    public function setRawAttributes(array $attributes, $sync = false)
    {
    }

    /**
     * Get the model's original attribute values.
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed|array
     * @see \Illuminate\Database\Eloquent\Model::getOriginal()
     */
    public function getOriginal($key = null, $default = null)
    {
    }

    /**
     * Sync the original attributes with the current.
     *
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::syncOriginal()
     */
    public function syncOriginal()
    {
    }

    /**
     * Sync a single original attribute with its current value.
     *
     * @param string $attribute
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::syncOriginalAttribute()
     */
    public function syncOriginalAttribute($attribute)
    {
    }

    /**
     * Determine if the model or given attribute(s) have been modified.
     *
     * @param array|string|null $attributes
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isDirty()
     */
    public function isDirty($attributes = null)
    {
    }

    /**
     * Determine if the model or given attribute(s) have remained the same.
     *
     * @param array|string|null $attributes
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isClean()
     */
    public function isClean($attributes = null)
    {
    }

    /**
     * Get the attributes that have been changed since last sync.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getDirty()
     */
    public function getDirty()
    {
    }

    /**
     * Determine if the new and old values for a given key are numerically equivalent.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::originalIsNumericallyEquivalent()
     */
    protected function originalIsNumericallyEquivalent($key)
    {
    }

    /**
     * Append attributes to query when building a query.
     *
     * @param array|string $attributes
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::append()
     */
    public function append($attributes)
    {
    }

    /**
     * Set the accessors to append to model arrays.
     *
     * @param array $appends
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setAppends()
     */
    public function setAppends(array $appends)
    {
    }

    /**
     * Get the mutated attributes for a given instance.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getMutatedAttributes()
     */
    public function getMutatedAttributes()
    {
    }

    /**
     * Extract and cache all the mutated attributes of a class.
     *
     * @param string $class
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::cacheMutatedAttributes()
     */
    public static function cacheMutatedAttributes($class)
    {
    }

    /**
     * Get all of the attribute mutator methods.
     *
     * @param mixed $class
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getMutatorMethods()
     */
    protected static function getMutatorMethods($class)
    {
    }

    /**
     * Register an observer with the Model.
     *
     * @param object|string $class
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::observe()
     */
    public static function observe($class)
    {
    }

    /**
     * Get the observable event names.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getObservableEvents()
     */
    public function getObservableEvents()
    {
    }

    /**
     * Set the observable event names.
     *
     * @param array $observables
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setObservableEvents()
     */
    public function setObservableEvents(array $observables)
    {
    }

    /**
     * Add an observable event name.
     *
     * @param array|mixed $observables
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::addObservableEvents()
     */
    public function addObservableEvents($observables)
    {
    }

    /**
     * Remove an observable event name.
     *
     * @param array|mixed $observables
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::removeObservableEvents()
     */
    public function removeObservableEvents($observables)
    {
    }

    /**
     * Register a model event with the dispatcher.
     *
     * @param string $event
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::registerModelEvent()
     */
    protected static function registerModelEvent($event, $callback)
    {
    }

    /**
     * Fire the given event for the model.
     *
     * @param string $event
     * @param bool $halt
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::fireModelEvent()
     */
    protected function fireModelEvent($event, $halt = true)
    {
    }

    /**
     * Fire a custom model event for the given event.
     *
     * @param string $event
     * @param string $method
     * @return mixed|null
     * @see \Illuminate\Database\Eloquent\Model::fireCustomModelEvent()
     */
    protected function fireCustomModelEvent($event, $method)
    {
    }

    /**
     * Filter the model event results.
     *
     * @param mixed $result
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::filterModelEventResults()
     */
    protected function filterModelEventResults($result)
    {
    }

    /**
     * Register a saving model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::saving()
     */
    public static function saving($callback)
    {
    }

    /**
     * Register a saved model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::saved()
     */
    public static function saved($callback)
    {
    }

    /**
     * Register an updating model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::updating()
     */
    public static function updating($callback)
    {
    }

    /**
     * Register an updated model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::updated()
     */
    public static function updated($callback)
    {
    }

    /**
     * Register a creating model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::creating()
     */
    public static function creating($callback)
    {
    }

    /**
     * Register a created model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::created()
     */
    public static function created($callback)
    {
    }

    /**
     * Register a deleting model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::deleting()
     */
    public static function deleting($callback)
    {
    }

    /**
     * Register a deleted model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::deleted()
     */
    public static function deleted($callback)
    {
    }

    /**
     * Remove all of the event listeners for the model.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::flushEventListeners()
     */
    public static function flushEventListeners()
    {
    }

    /**
     * Get the event dispatcher instance.
     *
     * @return \Illuminate\Contracts\Events\Dispatcher
     * @see \Illuminate\Database\Eloquent\Model::getEventDispatcher()
     */
    public static function getEventDispatcher()
    {
    }

    /**
     * Set the event dispatcher instance.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $dispatcher
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::setEventDispatcher()
     */
    public static function setEventDispatcher(Dispatcher $dispatcher)
    {
    }

    /**
     * Unset the event dispatcher for models.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::unsetEventDispatcher()
     */
    public static function unsetEventDispatcher()
    {
    }

    /**
     * Register a new global scope on the model.
     *
     * @param \Illuminate\Database\Eloquent\Scope|\Closure|string $scope
     * @param \Closure|null $implementation
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * @see \Illuminate\Database\Eloquent\Model::addGlobalScope()
     */
    public static function addGlobalScope($scope, Closure $implementation = null)
    {
    }

    /**
     * Determine if a model has a global scope.
     *
     * @param \Illuminate\Database\Eloquent\Scope|string $scope
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::hasGlobalScope()
     */
    public static function hasGlobalScope($scope)
    {
    }

    /**
     * Get a global scope registered with the model.
     *
     * @param \Illuminate\Database\Eloquent\Scope|string $scope
     * @return \Illuminate\Database\Eloquent\Scope|\Closure|null
     * @see \Illuminate\Database\Eloquent\Model::getGlobalScope()
     */
    public static function getGlobalScope($scope)
    {
    }

    /**
     * Get the global scopes for this class instance.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getGlobalScopes()
     */
    public function getGlobalScopes()
    {
    }

    /**
     * Define a one-to-one relationship.
     *
     * @param string $related
     * @param string $foreignKey
     * @param string $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @see \Illuminate\Database\Eloquent\Model::hasOne()
     */
    public function hasOne($related, $foreignKey = null, $localKey = null)
    {
    }

    /**
     * Define a polymorphic one-to-one relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $type
     * @param string $id
     * @param string $localKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     * @see \Illuminate\Database\Eloquent\Model::morphOne()
     */
    public function morphOne($related, $name, $type = null, $id = null, $localKey = null)
    {
    }

    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @param string $related
     * @param string $foreignKey
     * @param string $ownerKey
     * @param string $relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @see \Illuminate\Database\Eloquent\Model::belongsTo()
     */
    public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null)
    {
    }

    /**
     * Define a polymorphic, inverse one-to-one or many relationship.
     *
     * @param string $name
     * @param string $type
     * @param string $id
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     * @see \Illuminate\Database\Eloquent\Model::morphTo()
     */
    public function morphTo($name = null, $type = null, $id = null)
    {
    }

    /**
     * Define a polymorphic, inverse one-to-one or many relationship.
     *
     * @param string $name
     * @param string $type
     * @param string $id
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     * @see \Illuminate\Database\Eloquent\Model::morphEagerTo()
     */
    protected function morphEagerTo($name, $type, $id)
    {
    }

    /**
     * Define a polymorphic, inverse one-to-one or many relationship.
     *
     * @param string $target
     * @param string $name
     * @param string $type
     * @param string $id
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     * @see \Illuminate\Database\Eloquent\Model::morphInstanceTo()
     */
    protected function morphInstanceTo($target, $name, $type, $id)
    {
    }

    /**
     * Retrieve the actual class name for a given morph class.
     *
     * @param string $class
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getActualClassNameForMorph()
     */
    public static function getActualClassNameForMorph($class)
    {
    }

    /**
     * Guess the "belongs to" relationship name.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::guessBelongsToRelation()
     */
    protected function guessBelongsToRelation()
    {
    }

    /**
     * Define a one-to-many relationship.
     *
     * @param string $related
     * @param string $foreignKey
     * @param string $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @see \Illuminate\Database\Eloquent\Model::hasMany()
     */
    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
    }

    /**
     * Define a has-many-through relationship.
     *
     * @param string $related
     * @param string $through
     * @param string|null $firstKey
     * @param string|null $secondKey
     * @param string|null $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     * @see \Illuminate\Database\Eloquent\Model::hasManyThrough()
     */
    public function hasManyThrough($related, $through, $firstKey = null, $secondKey = null, $localKey = null)
    {
    }

    /**
     * Define a polymorphic one-to-many relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $type
     * @param string $id
     * @param string $localKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     * @see \Illuminate\Database\Eloquent\Model::morphMany()
     */
    public function morphMany($related, $name, $type = null, $id = null, $localKey = null)
    {
    }

    /**
     * Define a many-to-many relationship.
     *
     * @param string $related
     * @param string $table
     * @param string $foreignKey
     * @param string $relatedKey
     * @param string $relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @see \Illuminate\Database\Eloquent\Model::belongsToMany()
     */
    public function belongsToMany($related, $table = null, $foreignKey = null, $relatedKey = null, $relation = null)
    {
    }

    /**
     * Define a polymorphic many-to-many relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $table
     * @param string $foreignKey
     * @param string $relatedKey
     * @param bool $inverse
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     * @see \Illuminate\Database\Eloquent\Model::morphToMany()
     */
    public function morphToMany($related, $name, $table = null, $foreignKey = null, $relatedKey = null, $inverse = false)
    {
    }

    /**
     * Define a polymorphic, inverse many-to-many relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $table
     * @param string $foreignKey
     * @param string $relatedKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     * @see \Illuminate\Database\Eloquent\Model::morphedByMany()
     */
    public function morphedByMany($related, $name, $table = null, $foreignKey = null, $relatedKey = null)
    {
    }

    /**
     * Get the relationship name of the belongs to many.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::guessBelongsToManyRelation()
     */
    protected function guessBelongsToManyRelation()
    {
    }

    /**
     * Get the joining table name for a many-to-many relation.
     *
     * @param string $related
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::joiningTable()
     */
    public function joiningTable($related)
    {
    }

    /**
     * Determine if the model touches a given relation.
     *
     * @param string $relation
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::touches()
     */
    public function touches($relation)
    {
    }

    /**
     * Touch the owning relations of the model.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::touchOwners()
     */
    public function touchOwners()
    {
    }

    /**
     * Get the polymorphic relationship columns.
     *
     * @param string $name
     * @param string $type
     * @param string $id
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getMorphs()
     */
    protected function getMorphs($name, $type, $id)
    {
    }

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getMorphClass()
     */
    public function getMorphClass()
    {
    }

    /**
     * Create a new model instance for a related model.
     *
     * @param string $class
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::newRelatedInstance()
     */
    protected function newRelatedInstance($class)
    {
    }

    /**
     * Get all the loaded relations for the instance.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getRelations()
     */
    public function getRelations()
    {
    }

    /**
     * Get a specified relationship.
     *
     * @param string $relation
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getRelation()
     */
    public function getRelation($relation)
    {
    }

    /**
     * Determine if the given relation is loaded.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::relationLoaded()
     */
    public function relationLoaded($key)
    {
    }

    /**
     * Set the specific relationship in the model.
     *
     * @param string $relation
     * @param mixed $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setRelation()
     */
    public function setRelation($relation, $value)
    {
    }

    /**
     * Set the entire relations array on the model.
     *
     * @param array $relations
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setRelations()
     */
    public function setRelations(array $relations)
    {
    }

    /**
     * Get the relationships that are touched on save.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getTouchedRelations()
     */
    public function getTouchedRelations()
    {
    }

    /**
     * Set the relationships that are touched on save.
     *
     * @param array $touches
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setTouchedRelations()
     */
    public function setTouchedRelations(array $touches)
    {
    }

    /**
     * Update the model's update timestamp.
     *
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::touch()
     */
    public function touch()
    {
    }

    /**
     * Update the creation and update timestamps.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::updateTimestamps()
     */
    protected function updateTimestamps()
    {
    }

    /**
     * Set the value of the "created at" attribute.
     *
     * @param mixed $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setCreatedAt()
     */
    public function setCreatedAt($value)
    {
    }

    /**
     * Set the value of the "updated at" attribute.
     *
     * @param mixed $value
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setUpdatedAt()
     */
    public function setUpdatedAt($value)
    {
    }

    /**
     * Get a fresh timestamp for the model.
     *
     * @return \Carbon\Carbon
     * @see \Illuminate\Database\Eloquent\Model::freshTimestamp()
     */
    public function freshTimestamp()
    {
    }

    /**
     * Get a fresh timestamp for the model.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::freshTimestampString()
     */
    public function freshTimestampString()
    {
    }

    /**
     * Determine if the model uses timestamps.
     *
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::usesTimestamps()
     */
    public function usesTimestamps()
    {
    }

    /**
     * Get the name of the "created at" column.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getCreatedAtColumn()
     */
    public function getCreatedAtColumn()
    {
    }

    /**
     * Get the name of the "updated at" column.
     *
     * @return string
     * @see \Illuminate\Database\Eloquent\Model::getUpdatedAtColumn()
     */
    public function getUpdatedAtColumn()
    {
    }

    /**
     * Get the hidden attributes for the model.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getHidden()
     */
    public function getHidden()
    {
    }

    /**
     * Set the hidden attributes for the model.
     *
     * @param array $hidden
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setHidden()
     */
    public function setHidden(array $hidden)
    {
    }

    /**
     * Add hidden attributes for the model.
     *
     * @param array|string|null $attributes
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::addHidden()
     */
    public function addHidden($attributes = null)
    {
    }

    /**
     * Get the visible attributes for the model.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getVisible()
     */
    public function getVisible()
    {
    }

    /**
     * Set the visible attributes for the model.
     *
     * @param array $visible
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::setVisible()
     */
    public function setVisible(array $visible)
    {
    }

    /**
     * Add visible attributes for the model.
     *
     * @param array|string|null $attributes
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::addVisible()
     */
    public function addVisible($attributes = null)
    {
    }

    /**
     * Make the given, typically hidden, attributes visible.
     *
     * @param array|string $attributes
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::makeVisible()
     */
    public function makeVisible($attributes)
    {
    }

    /**
     * Make the given, typically visible, attributes hidden.
     *
     * @param array|string $attributes
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::makeHidden()
     */
    public function makeHidden($attributes)
    {
    }

    /**
     * Get the fillable attributes for the model.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getFillable()
     */
    public function getFillable()
    {
    }

    /**
     * Set the fillable attributes for the model.
     *
     * @param array $fillable
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::fillable()
     */
    public function fillable(array $fillable)
    {
    }

    /**
     * Get the guarded attributes for the model.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getGuarded()
     */
    public function getGuarded()
    {
    }

    /**
     * Set the guarded attributes for the model.
     *
     * @param array $guarded
     * @return $this
     * @see \Illuminate\Database\Eloquent\Model::guard()
     */
    public function guard(array $guarded)
    {
    }

    /**
     * Disable all mass assignable restrictions.
     *
     * @param bool $state
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::unguard()
     */
    public static function unguard($state = true)
    {
    }

    /**
     * Enable the mass assignment restrictions.
     *
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::reguard()
     */
    public static function reguard()
    {
    }

    /**
     * Determine if current state is "unguarded".
     *
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isUnguarded()
     */
    public static function isUnguarded()
    {
    }

    /**
     * Run the given callable while being unguarded.
     *
     * @param callable $callback
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::unguarded()
     */
    public static function unguarded(callable $callback)
    {
    }

    /**
     * Determine if the given attribute may be mass assigned.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isFillable()
     */
    public function isFillable($key)
    {
    }

    /**
     * Determine if the given key is guarded.
     *
     * @param string $key
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isGuarded()
     */
    public function isGuarded($key)
    {
    }

    /**
     * Determine if the model is totally guarded.
     *
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::totallyGuarded()
     */
    public function totallyGuarded()
    {
    }

    /**
     * Get the fillable attributes of a given array.
     *
     * @param array $attributes
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::fillableFromArray()
     */
    protected function fillableFromArray(array $attributes)
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
     * Add a basic where clause to the query.
     *
     * @param string|\Closure $column
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
     * @param string|\Closure $column
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
     * @param array $ids
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
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::create()
     */
    public static function create(array $attributes = [])
    {
    }

    /**
     * Save a new model and return the instance. Allow mass-assignment.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Builder::forceCreate()
     */
    public static function forceCreate(array $attributes)
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
    protected static function addNewWheresWithinGroup(\Illuminate\Database\Query\Builder $query, $originalWhereCount)
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
    protected static function groupWhereSliceForScope(\Illuminate\Database\Query\Builder $query, $whereSlice)
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
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::first()
     */
    public static function first($columns = ['*'])
    {
    }

    /**
     * Apply the callback's query changes if the given "value" is true.
     *
     * @param mixed $value
     * @param \Closure $callback
     * @param \Closure $default
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Builder::when()
     */
    public static function when($value, $callback, $default = null)
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
    protected static function addHasWhere(Builder $hasQuery, Relation $relation, $operator, $count, $boolean)
    {
    }

    /**
     * Merge the where constraints from another query to the current query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $from
     * @return \Illuminate\Database\Eloquent\Builder|static
     * @see \Illuminate\Database\Eloquent\Builder::mergeConstraintsFrom()
     */
    public static function mergeConstraintsFrom(Builder $from)
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
    protected static function addWhereCountQuery(\Illuminate\Database\Query\Builder $query, $operator = '>=', $count = 1, $boolean = 'and')
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
     * @param string $operator
     * @param string $second
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
     * @param string $operator
     * @param string $second
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
     * @param string $operator
     * @param string $second
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
     * @param string $first
     * @param string $operator
     * @param string $second
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::crossJoin()
     */
    public static function crossJoin($table, $first = null, $operator = null, $second = null)
    {
    }

    /**
     * Pass the query to a given callback.
     *
     * @param \Closure $callback
     * @return \Illuminate\Database\Query\Builder
     * @see \Illuminate\Database\Query\Builder::tap()
     */
    public static function tap($callback)
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
     * @param array $bindings
     * @return \Illuminate\Database\Query\Builder|static
     * @see \Illuminate\Database\Query\Builder::orWhereRaw()
     */
    public static function orWhereRaw($sql, array $bindings = [])
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
    public static function addWhereExistsQuery(\Illuminate\Database\Query\Builder $query, $boolean = 'and', $not = false)
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
     * @param string $operator
     * @param string $value
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
     * @param string $operator
     * @param string $value
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
     * Get an array orders with all orders for an given column removed.
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
     * @param string $sequence
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
    public static function mergeBindings(\Illuminate\Database\Query\Builder $query)
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
     * @param array $except
     * @return static
     * @see \Illuminate\Database\Query\Builder::cloneWithout()
     */
    public static function cloneWithout(array $except)
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
     * @param callable $macro
     * @return null
     * @see \Illuminate\Database\Query\Builder::macro()
     */
    public static function macro($name, callable $macro)
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