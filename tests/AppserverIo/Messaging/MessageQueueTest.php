<?php

/**
 * AppserverIo\Messaging\MessageQueueTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Messaging;

/**
 * Test implementation for the MessageQueue class implementation.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/messaging
 * @link      http://www.appserver.io
 */
class MessageQueueTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Message queue name for testing purposes.
     *
     * @var string
     */
    const NAME = 'testName';

    /**
     * The instance we want to test.
     *
     * @var \AppserverIo\Messaging\MessageQueue
     */
    protected $messageQueue;

    /**
     * Initializes the method we wan to test.
     *
     * @return void
     * @see \PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->messageQueue = MessageQueue::createQueue(MessageQueueTest::NAME);
    }

    /**
     * Test the getName() method.
     *
     * @return void
     */
    public function testGetName()
    {
        $this->assertSame(MessageQueueTest::NAME, $this->messageQueue->getName());
    }
}
