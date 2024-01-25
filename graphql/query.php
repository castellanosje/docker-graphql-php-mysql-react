<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use App\Models\User;
use App\Models\Address;

$rootQuery = new ObjectType([
    'name' => 'Query',
    'description' => 'Root query',
    'fields' => [
        'user' => [
            'type' => $userType,
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],
            'resolve' => function($root, $args) {
                $user = User::find($args['id'])->toArray();
                return $user;
            }
        ],
        'users' => [
            'type' => Type::listOf($userType),
            'resolve' => function($root, $args) {
                $users = User::all()->toArray();
                return $users;
            }
        ],
        'address'=>[
            'type' => $addressType,
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],
            'resolve'=> function($root, $args){
                $address = Address::find($args['id'])->toArray();
                return $address;
            }
        ]
    ]

]);

