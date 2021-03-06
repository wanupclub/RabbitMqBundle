<?php

namespace WanupSml\RabbitMqBundle\Tests\RabbitMq;

use WanupSml\RabbitMqBundle\RabbitMq\Consumer;
use PhpAmqpLib\Connection\AMQPLazyConnection;

class BaseAmqpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \ErrorException
     */
    public function testLazyConnection()
    {
        $amqpLazyConnection = new AMQPLazyConnection('localhost', 123, 'lazy_user', 'lazy_password');

        $consumer = new Consumer($amqpLazyConnection, null);
        $consumer->getChannel();
    }
}
