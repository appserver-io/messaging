<?php

/**
 * AppserverIo\Psr\MessageQueueProtocol\Messages\MessageMonitor
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

namespace AppserverIo\Psr\MessageQueueProtocol\Messages;

use AppserverIo\Psr\MessageQueueProtocol\Monitor;

/**
 * Class MessageMonitor
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
class MessageMonitor implements Monitor
{

    /**
     * The target counter for monitoring the message.
     * @var integer
     */
    protected $target = 0;

    /**
     * The row counter for monitoring the message.
     * @var integer
     */
    protected $rowCount = 0;

    /**
     * The log message for monitoring the message.
     * @var string
     */
    protected $logMessage = '';

    /**
     * Initializes the queue with the name to use.
     *
     * @param int    $target     The target
     * @param string $logMessage Holds the queue name to use
     */
    public function __construct($target, $logMessage)
    {
        $this->target = $target;
        $this->logMessage = $logMessage;
    }

    /**
     * Sets the log message.
     *
     * @param string $logMessage The log message
     *
     * @return void
     */
    public function setLogMessage($logMessage)
    {
        $this->logMessage = $logMessage;
    }

    /**
     * Returns the row counter.
     *
     * @param integer $rowCount The row counter
     *
     * @return void
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

    /**
     * Returns the log message.
     *
     * @return string The log message
     */
    public function getLogMessage()
    {
        return $this->logMessage;
    }

    /**
     * Returns the row counter.
     *
     * @return integer The row counter
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * Returns the target counter.
     *
     * @return integer The target counter
     */
    public function getTarget()
    {
        return $this->target;
    }
}
