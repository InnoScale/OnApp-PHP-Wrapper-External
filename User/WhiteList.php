<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * User White List
 *
 * @todo        write description
 *
 * @category    API wrapper
 * @package     OnApp
 * @subpackage  User
 * @author      Yakubskiy Yuriy
 * @copyright   (c) 2012 OnApp
 * @link        http://www.onapp.com/
 * @see         OnApp
 */

/**
 * User White List
 *
 * The OnApp_User_WhiteList class supports the following basic methods
 *
 * The OnApp_User_WhiteList class uses the following basic methods:
 * {@link load}, {@link save}, {@link delete}, and {@link getList}.
 *
 * For full fields reference and curl request details visit: ( http://help.onapp.com/manual.php?m=2 )
 */
/**
 * Magic properties used for autocomplete
 *
 * @property integer  $id
 * @property string   $created_at
 * @property string   $updated_at
 * @property integer  $user_id
 * @property string   $ip
 * @property string   $description
 */
class OnApp_User_WhiteList extends OnApp {
	/**
	 * root tag used in the API request
	 *
	 * @var string
	 */
	protected $rootElement = 'user_white_list';

	/**
	 * alias processing the object data
	 *
	 * @var string
	 */
	protected $URLPath = 'user_white_lists';

	/**
	 * Returns the URL Alias of the API Class that inherits the OnApp class
	 *
	 * @param string $action action name
	 *
	 * @return string API resource
	 */
	protected function getURL( $action = ONAPP_GETRESOURCE_DEFAULT ) {
		switch( $action ) {
			case ONAPP_GETRESOURCE_DEFAULT:
				/**
				 * ROUTE :
				 *
				 * @name user_user_white_lists
				 * @method GET
				 * @alias   /users/:user_id/user_white_lists(.:format)
				 * @format  {:controller=>"user_white_lists", :action=>"index"}
				 */
				/**
				 * ROUTE :
				 *
				 * @name user_user_white_list
				 * @method GET
				 * @alias  /users/:user_id/user_white_lists/:id(.:format)
				 * @format {:controller=>"user_white_lists", :action=>"show"}
				 */
				/**
				 * ROUTE :
				 *
				 * @name
				 * @method PUT
				 * @alias  /users/:user_id/user_white_lists/:id(.:format)
				 * @format {:controller=>"user_white_lists", :action=>"update"}
				 */
				/**
				 * ROUTE :
				 *
				 * @name
				 * @method POST
				 * @alias  /users/:user_id/user_white_lists(.:format)
				 * @format {:controller=>"user_white_lists", :action=>"create"}
				 */
				/**
				 * ROUTE :
				 *
				 * @name user_vm_stats
				 * @method DELETE
				 * @alias   /users/:user_id/user_white_lists/:id(.:format)
				 * @format  {:controller=>"user_white_lists", :action=>"destroy"}
				 */
				if( is_null( $this->user_id ) && is_null( $this->loadedObject->user_id ) ) {
					$this->logger->logError(
						'getURL( ' . $action . ' ): property user_id not set.',
						__FILE__,
						__LINE__
					);
				}
				else {
					if( is_null( $this->user_id ) ) {
						$this->user_id = $this->loadedObject->user_id;
					}
				}
				$resource = 'users/' . $this->user_id . '/' . $this->URLPath;
				$this->logger->logDebug( 'getURL( ' . $action . ' ): return ' . $resource );
				break;

			default:
				$resource = parent::getURL( $action );
		}

		return $resource;
	}

	/**
	 * Sends an API request to get the Objects. After requesting,
	 * unserializes the received response into the array of Objects
	 *
	 * @param integer $user_id  User ID
	 * @param mixed   $url_args additional parameters
	 *
	 * @return mixed an array of Object instances on success. Otherwise false
	 */
	function getList( $user_id = null, $url_args = null ) {
		if( is_null( $user_id ) && ! is_null( $this->user_id ) ) {
			$user_id = $this->user_id;
		}

		if( ! is_null( $user_id ) ) {
			$this->user_id = $user_id;

			return parent::getList( $user_id, $url_args );
		}
		else {
			$this->logger->logError(
				'getList: property user_id not set.',
				__FILE__,
				__LINE__
			);
		}
	}

	/**
	 * Sends an API request to get the Object after sending,
	 * unserializes the response into an object
	 *
	 * The key field Parameter ID is used to load the Object. You can re-set
	 * this parameter in the class inheriting OnApp class.
	 *
	 * @param integer $id      white list id
	 * @param integer $user_id User id
	 *
	 * @return mixed serialized Object instance from API
	 */
	function load( $id = null, $user_id = null ) {
		if( is_null( $user_id ) && ! is_null( $this->user_id ) ) {
			$user_id = $this->user_id;
		}

		if( is_null( $user_id ) &&
			isset( $this->loadedObject ) &&
			! is_null( $this->loadedObject->user_id )
		) {
			$user_id = $this->loadedObject->user_id;
		}

		if( is_null( $id ) && ! is_null( $this->id ) ) {
			$id = $this->id;
		}

		if( is_null( $id ) &&
			isset( $this->loadedObject ) &&
			! is_null( $this->loadedObject->id )
		) {
			$id = $this->loadedObject->id;
		}

		$this->logger->logMessage( 'load: Load class ( id => ' . $id . ' ).' );

		if( ! is_null( $id ) && ! is_null( $user_id ) ) {
			$this->id      = $id;
			$this->user_id = $user_id;

			$this->setAPIResource( $this->getURL( ONAPP_GETRESOURCE_LOAD ) );
			$result                = $this->sendRequest( ONAPP_REQUEST_METHOD_GET );
			$this->loadedObject = $result;

			return $result;
		}
		else {
			if( is_null( $id ) ) {
				$this->logger->logError(
					'load: property id not set.',
					__FILE__,
					__LINE__
				);
			}
			else {
				$this->logger->logError(
					'load: property user_id not set.',
					__FILE__,
					__LINE__
				);
			}
		}
	}
}