<?php

namespace App\Services;

use App\Contracts\GreetInterface;
use App\Repositories\GreetRepository;

class GreetService implements GreetInterface {

  protected $greetRepository;

  public function __construct(GreetRepository $greetRepository)
  {
    $this->greetRepository = $greetRepository;
  }

  public function greet() : string {
    $name = $this->greetRepository->getName();
    return 'Hello'. $name;
  }
}