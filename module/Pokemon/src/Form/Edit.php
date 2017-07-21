<?php

namespace Pokemon\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Pokemon\Entity\Hydrator\PokemonHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;

class Edit extends Form
{
  public function __construct($allTypes)
  {
      parent::__construct('edit');

     $hydrator = new AggregateHydrator();
     $hydrator->add(new PokemonHydrator());

     $this->setHydrator($hydrator);

     $id = new Element\Hidden('id');

      $national_id = new Element\Number('national_id');
      $national_id->setAttribute('class', 'validate');

      $name = new Element\Text('name');
      $name->setAttribute('class', 'validate');

      $description = new Element\Textarea('description');
      $description->setAttribute('class', 'materialize-textarea');

      $submit = new Element\Submit('submit');
      $submit->setValue('Modifier le Pokémon');
      $submit->setAttribute('class', 'btn btn-primary');

      $type1 = new Element\Select('type1');
      $type1->setValueOptions($allTypes);

      $type2 = new Element\Select('type2');
      $type2->setValueOptions($allTypes);

      $evolution = new Element\Number('evolution');
      $evolution->setAttribute('class', 'form-control');

      $this->add($id);
      $this->add($national_id);
      $this->add($name);
      $this->add($description);
      $this->add($type1);
      $this->add($type2);
      $this->add($evolution);
      $this->add($submit);
}
}
