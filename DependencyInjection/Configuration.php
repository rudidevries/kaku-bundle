<?php

namespace RudideVries\Bundle\KakuBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 * @author Rudi de Vries <rudidevries@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kaku');

        $rootNode
            ->children()
                ->arrayNode('ssh')
                    ->children()
                        ->scalarNode('host')->isRequired()->end()
                        ->scalarNode('username')->isRequired()->end()
                        ->scalarNode('public_key')->isRequired()->end()
                        ->scalarNode('private_key')->isRequired()->end()
                    ->end()
                ->end()
                ->scalarNode('command')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
