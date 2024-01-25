<?php

require('mutations/userMutations.php');
use GraphQL\Type\Definition\ObjectType;

$mutations = array();
$mutations = array_merge(
    $userMutations
);


$rootMutation = new ObjectType([
    'name' => 'Mutation',
    'description' => 'Root mutation',
    'fields' => $mutations
]);