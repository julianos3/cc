<?php

namespace CentralCondo\Validators\Portal;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class FinalityValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3'
        ],
   ];

}
