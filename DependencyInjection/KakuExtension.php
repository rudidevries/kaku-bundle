<?php

namespace RudideVries\Bundle\KakuBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 * @author Rudi de Vries <rudidevries@gmail.com>
 */
class KakuExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['ssh'])) {
            $container->setParameter('kaku.ssh.host', $config['ssh']['host']);
            $container->setParameter('kaku.ssh.username', $config['ssh']['username']);
            $container->setParameter('kaku.ssh.public_key', $config['ssh']['public_key']);
            $container->setParameter('kaku.ssh.private_key', $config['ssh']['private_key']);
        }

        $container->setParameter('kaku.command', $config['command']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
