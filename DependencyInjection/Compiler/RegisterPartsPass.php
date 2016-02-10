<?php

namespace WanupSml\RabbitMqBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class RegisterPartsPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('wanup_sml_rabbit_mq.parts_holder')) {
            return;
        }

        $definition = $container->getDefinition('wanup_sml_rabbit_mq.parts_holder');

        $tags = array(
            'wanup_sml_rabbit_mq.base_amqp',
            'wanup_sml_rabbit_mq.producer',
            'wanup_sml_rabbit_mq.consumer',
            'wanup_sml_rabbit_mq.multi_consumer',
            'wanup_sml_rabbit_mq.anon_consumer',
            'wanup_sml_rabbit_mq.rpc_client',
            'wanup_sml_rabbit_mq.rpc_server',
        );

        foreach ($tags as $tag) {
            foreach ($container->findTaggedServiceIds($tag) as $id => $attributes) {
                $definition->addMethodCall('addPart', array($tag, new Reference($id)));
            }
        }
    }
}
