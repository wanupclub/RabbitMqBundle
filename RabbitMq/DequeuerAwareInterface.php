<?php

namespace WanupSml\RabbitMqBundle\RabbitMq;

interface DequeuerAwareInterface
{
    public function setDequeuer(DequeuerInterface $dequeuer);
}
