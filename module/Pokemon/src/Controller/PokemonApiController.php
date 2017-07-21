<?php
namespace Pokemon\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Cache\StorageFactory;

use Pokemon\Entity\Pokemon;
use Pokemon\Entity\Type;

class PokemonApiController extends AbstractRestfulController
{
    protected $pokemonService;
    protected $cache;

    public function __construct($pokemonService)
    {
        $this->pokemonService = $pokemonService;
        $this->cache = StorageFactory::factory([
            'adapter' => [
                'name'  => 'filesystem',
                'options' => [
                    'namespace' => 'api_poke'
                ]
            ],
            'plugins' => [
                'exception_handler' => [
                    'throw_exceptions' => false
                ],
                'Serializer'
            ]
        ]);
    }

    public function get($id) {
        $pokemon = $this->pokemonService->findById($id);

        return new JsonModel(
            ['data'=> $pokemon]
        );
    }

    public function getList() {
        $pokemons = $this->pokemonService->fetchAll();

        return new JsonModel(
            ['data'=> $pokemons]
        );
    }
}
