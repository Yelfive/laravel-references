<?php

namespace fk\utility\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use self;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Contracts\Events\Dispatcher;
use Closure;


class Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    /**
     * @var bool
     * @see dateAsInteger()
     */
    public static $serializeDateAsInteger;

    /**
     * @var null|MessageBag
     */
    public $errors;

    /**
     * @var null|\Illuminate\Validation\Validator
     */
    public $validator;

    
    protected $messages;

    
    private $_rules;

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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::load()
     */
    public function load($relations)
    {
    }

    /**
     * Eager load relations on the model if they are not already eager loaded.
     *
     * @param array|string $relations
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::loadMissing()
     */
    public function loadMissing($relations)
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
     * Get a new query builder with no relationships loaded.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::newQueryWithoutRelationships()
     */
    public function newQueryWithoutRelationships()
    {
    }

    /**
     * Register the global scopes for this builder instance.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::registerGlobalScopes()
     */
    public function registerGlobalScopes($builder)
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
     * Get a new query to restore one or more models by their queueable IDs.
     *
     * @param array|int $ids
     * @return \Illuminate\Database\Eloquent\Builder
     * @see \Illuminate\Database\Eloquent\Model::newQueryForRestoration()
     */
    public function newQueryForRestoration($ids)
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
    public function newPivot(self $parent, array $attributes, $table, $exists, $using = null)
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
     * Reload the current model instance with fresh attributes from the database.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::refresh()
     */
    public function refresh()
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
     * @param \Illuminate\Database\Eloquent\Model|null $model
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::is()
     */
    public function is($model)
    {
    }

    /**
     * Determine if two models are not the same.
     *
     * @param \Illuminate\Database\Eloquent\Model|null $model
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::isNot()
     */
    public function isNot($model)
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * Get the queueable connection for the entity.
     *
     * @return mixed
     * @see \Illuminate\Database\Eloquent\Model::getQueueableConnection()
     */
    public function getQueueableConnection()
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
     * Retrieve the model for a bound value.
     *
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Model|null
     * @see \Illuminate\Database\Eloquent\Model::resolveRouteBinding()
     */
    public function resolveRouteBinding($value)
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Support\Carbon
     * @see \Illuminate\Database\Eloquent\Model::asDate()
     */
    protected function asDate($value)
    {
    }

    /**
     * Return a timestamp as DateTime object.
     *
     * @param mixed $value
     * @return \Illuminate\Support\Carbon
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * Set the array of model attributes. No checking is done.
     *
     * @param array $attributes
     * @param bool $sync
     * @return \Illuminate\Database\Eloquent\Model
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
     * Get a subset of the model's attributes.
     *
     * @param array|mixed $attributes
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::only()
     */
    public function only($attributes)
    {
    }

    /**
     * Sync the original attributes with the current.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::syncOriginal()
     */
    public function syncOriginal()
    {
    }

    /**
     * Sync a single original attribute with its current value.
     *
     * @param string $attribute
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::syncOriginalAttribute()
     */
    public function syncOriginalAttribute($attribute)
    {
    }

    /**
     * Sync the changed attributes.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::syncChanges()
     */
    public function syncChanges()
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
     * Determine if the model or given attribute(s) have been modified.
     *
     * @param array|string|null $attributes
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::wasChanged()
     */
    public function wasChanged($attributes = null)
    {
    }

    /**
     * Determine if the given attributes were changed.
     *
     * @param array $changes
     * @param array|string|null $attributes
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::hasChanges()
     */
    protected function hasChanges($changes, $attributes = null)
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
     * Get the attributes that was changed.
     *
     * @return array
     * @see \Illuminate\Database\Eloquent\Model::getChanges()
     */
    public function getChanges()
    {
    }

    /**
     * Determine if the new and old values for a given key are equivalent.
     *
     * @param string $key
     * @param mixed $current
     * @return bool
     * @see \Illuminate\Database\Eloquent\Model::originalIsEquivalent()
     */
    protected function originalIsEquivalent($key, $current)
    {
    }

    /**
     * Append attributes to query when building a query.
     *
     * @param array|string $attributes
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::append()
     */
    public function append($attributes)
    {
    }

    /**
     * Set the accessors to append to model arrays.
     *
     * @param array $appends
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * Register a retrieved model event with the dispatcher.
     *
     * @param \Closure|string $callback
     * @return null
     * @see \Illuminate\Database\Eloquent\Model::retrieved()
     */
    public static function retrieved($callback)
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
     * @param string|null $secondLocalKey
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     * @see \Illuminate\Database\Eloquent\Model::hasManyThrough()
     */
    public function hasManyThrough($related, $through, $firstKey = null, $secondKey = null, $localKey = null, $secondLocalKey = null)
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
     * @param string $foreignPivotKey
     * @param string $relatedPivotKey
     * @param string $parentKey
     * @param string $relatedKey
     * @param string $relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @see \Illuminate\Database\Eloquent\Model::belongsToMany()
     */
    public function belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $relation = null)
    {
    }

    /**
     * Define a polymorphic many-to-many relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $table
     * @param string $foreignPivotKey
     * @param string $relatedPivotKey
     * @param string $parentKey
     * @param string $relatedKey
     * @param bool $inverse
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     * @see \Illuminate\Database\Eloquent\Model::morphToMany()
     */
    public function morphToMany($related, $name, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $inverse = false)
    {
    }

    /**
     * Define a polymorphic, inverse many-to-many relationship.
     *
     * @param string $related
     * @param string $name
     * @param string $table
     * @param string $foreignPivotKey
     * @param string $relatedPivotKey
     * @param string $parentKey
     * @param string $relatedKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     * @see \Illuminate\Database\Eloquent\Model::morphedByMany()
     */
    public function morphedByMany($related, $name, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null)
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
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::setRelation()
     */
    public function setRelation($relation, $value)
    {
    }

    /**
     * Set the entire relations array on the model.
     *
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::setCreatedAt()
     */
    public function setCreatedAt($value)
    {
    }

    /**
     * Set the value of the "updated at" attribute.
     *
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::setUpdatedAt()
     */
    public function setUpdatedAt($value)
    {
    }

    /**
     * Get a fresh timestamp for the model.
     *
     * @return \Illuminate\Support\Carbon
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
     * @see \Illuminate\Database\Eloquent\Model::makeVisible()
     */
    public function makeVisible($attributes)
    {
    }

    /**
     * Make the given, typically visible, attributes hidden.
     *
     * @param array|string $attributes
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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
     * @return \Illuminate\Database\Eloquent\Model
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

}