<?php

require('mutations/userMutations.php');
require('mutations/addressMutations.php');

use GraphQL\Type\Definition\ObjectType;

$mutations = array();
$mutations = array_merge($userMutations, $addressMutations);


$rootMutation = new ObjectType([
    'name' => 'Mutation',
    'description' => 'Root mutation',
    'fields' => $mutations
]);