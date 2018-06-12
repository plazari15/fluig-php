<?php

namespace PedroLazari\PhpFluig\Service;

use PedroLazari\PhpFluig\Service\ApiClientService;
use PedroLazari\PhpFluig\Model\Dataset;

class WorkflowService
{
    public function findObservations($process){

        $apiClient = new ApiClientService;
        
        $data = [
            'processInstanceId' => $process,
        ];

        $jsonResponse = $apiClient->get('/api/public/2.0/workflows/findActiveTasks/'.$process);
        return $jsonResponse;
    }
    
}