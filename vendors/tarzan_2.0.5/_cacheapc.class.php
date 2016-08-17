<?php
/**
 * File: CacheAPC
 * 	APC-based caching class.
 *
 * Version:
 * 	2008.11.30
 *
 * Copyright:
 * 	2006-2009 LifeNexus Digital, Inc., and contributors.
 *
 * License:
 * 	Simplified BSD License - http://opensource.org/licenses/bsd-license.php
 *
 * See Also:
 * 	Tarzan - http://tarzan-aws.com
 * 	APC - http://php.net/apc
 */

/**
 * Class: CacheAPC
 * 	Container for all APC-based cache methods. Inherits additional methods from CacheCore.
 */
class CacheAPC extends CacheCore
{
    /**
     * Flag to determine the prefix of an APC function
     *
     * @var boolean
     */
    protected $apcFuncPrefix = 'apc';

	/**
	 * Method: __construct()
	 * 	The constructor
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	name - _string_ (Required) A name to uniquely identify the cache object.
	 * 	location - _string_ (Required) The location to store the cache object in. This may vary by cache method.
	 * 	expires - _integer_ (Required) The number of seconds until a cache object is considered stale.
	 *
	 * Returns:
	 * 	_object_ Reference to the cache object.
	 *
	 * See Also:
	 * 	Example Usage - http://tarzan-aws.com/docs/examples/cachecore/cache.phps
	 */
	public function __construct($name, $location, $expires)
	{
		parent::__construct($name, null, $expires);

		$this->id = $this->name;
		$this->apcFuncPrefix = function_exists('apcu_add') ? 'apcu' : 'apc';
	}

	/**
	 * Method: create()
	 * 	Creates a new cache.
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	data - _mixed_ (Required) The data to cache.
	 *
	 * Returns:
	 * 	_boolean_ Whether the operation was successful.
	 *
	 * See Also:
	 * 	Example Usage - http://tarzan-aws.com/docs/examples/cachecore/cache.phps
	 */
	public function create($data)
	{
    	$apcMethod = $this->apcFuncPrefix.'_add';
		return $apcMethod($this->id, serialize($data), $this->expires);
	}

	/**
	 * Method: read()
	 * 	Reads a cache.
	 *
	 * Access:
	 * 	public
	 *
	 * Returns:
	 * 	_mixed_ Either the content of the cache object, or _boolean_ false.
	 *
	 * See Also:
	 * 	Example Usage - http://tarzan-aws.com/docs/examples/cachecore/cache.phps
	 */
	public function read()
	{
    	$apcMethod = $this->apcFuncPrefix.'_fetch';
		return unserialize($apcMethod($this->id));
	}

	/**
	 * Method: update()
	 * 	Updates an existing cache.
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	data - _mixed_ (Required) The data to cache.
	 *
	 * Returns:
	 * 	_boolean_ Whether the operation was successful.
	 *
	 * See Also:
	 * 	Example Usage - http://tarzan-aws.com/docs/examples/cachecore/cache.phps
	 */
	public function update($data)
	{
    	$apcMethod = $this->apcFuncPrefix.'_store';
		return $apcMethod($this->id, serialize($data), $this->expires);
	}

	/**
	 * Method: delete()
	 * 	Deletes a cache.
	 *
	 * Access:
	 * 	public
	 *
	 * Returns:
	 * 	_boolean_ Whether the operation was successful.
	 */
	public function delete()
	{
    	$apcMethod = $this->apcFuncPrefix.'_delete';
		return $apcMethod($this->id);
	}

	/**
	 * Method: is_expired()
	 * 	Defined here, but always returns false. APC manages it's own expirations.
	 *
	 * Access:
	 * 	public
	 *
	 * Returns:
	 * 	_boolean_ Whether the cache is expired or not.
	 *
	 * See Also:
	 * 	Example Usage - http://tarzan-aws.com/docs/examples/cachecore/cache.phps
	 */
	public function is_expired()
	{
		return false;
	}
}
