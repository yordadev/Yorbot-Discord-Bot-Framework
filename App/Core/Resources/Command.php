<?php

namespace App\Core\Resources;

class Command
{
    protected $prefix;
    protected $name;

    public function __construct(string $prefix, string $name)
    {
        $this->prefix = $prefix;
        $this->name = $name;
    }

    public function getPrefix(){
        return $this->prefix;
    }

    public function getName(){
        return $this->name;
    }

    public function handle(){
        //
    }
}