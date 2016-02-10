<?php

namespace WanupSml\RabbitMqBundle\RabbitMq;

class Fallback implements ProducerInterface
{
    public function publish($msgBody, $routingKey = '', $additionalProperties = array())
    {
        return false;
    }
}
