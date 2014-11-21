<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\Utils\MQStatePaused
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Library
 * @package    TechDivision_MessageQueueProtocol
 * @subpackage Utils
 * @author     Tim Wagner <tw@techdivision.com>
 * @author     Markus Stockbauer <ms@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_MessageQueueProtocol
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Psr\MessageQueueProtocol\Utils;

/**
 * This class holds the MQStateKey used
 * for messages with the paused state.
 *
 * @category   Appserver
 * @package    Psr
 * @subpackage MessageQueueProtocol
 * @author     Tim Wagner <tw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io-psr/messagequeueprotocol
 * @link       http://www.appserver.io
 */
class MQStatePaused implements MQStateKey
{

    /**
     * Holds the key for messages with the paused state.
     * @var integer
     */
    const KEY = 2;

    /**
     * The string value for the 'paused' MQStateKey.
     * @var string
     */
    protected $state = "paused";

    /**
     * Private constructor for marking
     * the class as utiltiy.
     */
    final protected function __construct()
    {
        /* Class is a utility class */
    }

    /**
     * Returns a new instance of the MQStateKey.
     *
     * @return MQStatePaused The instance
     */
    public static function get()
    {
        return new MQStatePaused();
    }

    /**
     * Returns the key value of the
     * StateKey instance.
     *
     * @return integer The key value
     */
    public function getState()
    {
        return MQStatePaused::KEY;
    }

    /**
     * Returns the string value for the paused MQStateKey.
     *
     * @return string The string value
     */
    public function __toString()
    {
        return $this->state;
    }
}
