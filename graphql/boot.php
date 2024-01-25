<?php

require('types.php');
require('query.php');
require('mutations.php');

use GraphQL\GraphQL;
use GraphQL\Type\Schema;


$schema = new Schema([
    'query' => $rootQuery,
    'mutation' => $rootMutation
]);

try{
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    if($input !== null){
        $query = $input['query'];
        $result = GraphQL::executeQuery($schema, $query);
        $output = $result->toArray();
    }else{
        $output = [
            'error'=>[
                'message' => 'Query cannot be empty'
            ]
        ];
    }
   

}catch(\Exception $e){
    $output = [
        'error'=>[
            'message' => $e->getMessage()
        ]
    ];
}

header('Content-Type: application/json');
echo json_encode($output);


