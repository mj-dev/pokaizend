<?php
namespace Pokemon\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Cache\StorageFactory;
use Zend\Json\Json;

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

    public function getByName($name)
    {
        $pokemon = $this->pokemonService->find($name);
        $result = $this->postToArray($pokemon);

        return new JsonModel($result);
    }

    public function get($id)
    {
        $pokemon = $this->pokemonService->findById($id);
        $result = $this->postToArray($pokemon);

        return new JsonModel($result);
    }

    public function getList()
    {
        $cacheKey = 'list';
        $pokemons = $this->pokemonService->fetchAll();
        $results = [];
        foreach ($pokemons as $pokemon) {
            $results[] = $this->postToArray($pokemon);
        }
        $this->cache->setItem($cacheKey, $results);

        return new JsonModel(
            ['data'=> $results]
        );
    }

    protected function postToArray($post)
    {
        return [
            'id'        => $post->getId(),
            'national_id'     => $post->getNationalId(),
            'name'      => $post->getName(),
            'description'   => $post->getDescription(),
            'type1'   => $post->getType1(),
            'type2'   => $post->getType2(),
            'evolution'   => $post->getEvolution(),
        ];
    }
}
