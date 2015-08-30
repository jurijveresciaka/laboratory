<?php

namespace JurijVeresciaka\Laboratory\Symfony\Component\Config;

use JurijVeresciaka\Component\RegexHelper\RegexHelper;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class CustomConfiguration implements ConfigurationInterface
{
    /**
     * @var RegexHelper
     */
    protected $regexHelper;

    public function __construct()
    {
        $this->regexHelper = new RegexHelper();
    }

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $regexHelper = $this->regexHelper;

        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ItemPropertyList');

        $rootNode
            ->children()
                ->scalarNode('title')
                    ->cannotBeEmpty()
                ->end()
                ->enumNode('color')
                    ->isRequired()
                    ->values(array('white', 'black', 'gray'))
                ->end()
                ->scalarNode('code')
                    ->isRequired()
                    ->validate()
                    ->IfTrue(
                        function ($value) use ($regexHelper)
                        {
                            return !$regexHelper->isMatch('\d{3}-\d{4}', array(), $value);
                        }
                    )
                        ->thenInvalid('Invalid code %s')
                    ->end()
                ->end()
                ->arrayNode('numbers')
                    ->isRequired()
                    ->prototype('scalar')
                        ->validate()
                        ->IfTrue(
                            function ($value)
                            {
                                return preg_match('/^[a-z]+$/', $value) !== 1;
                            }
                        )
                        ->thenInvalid('Invalid code %s')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
