<?php

namespace PedroLazari\PhpFluig\Service;

use PedroLazari\PhpFluig\Model\Workflow;
use PedroLazari\PhpFluig\Service\ApiClientService;
use PedroLazari\PhpFluig\Model\Dataset;

class WorkflowService
{
    private $apiClient;

    CONST findObservationURL = '/api/public/2.0/workflows/findActiveTasks/';
    CONST createProcessObservation = '/api/public/2.0/workflows/createProcessObservation';


    public function __construct()
    {
        $this->apiClient = new ApiClientService;
    }

    public function findObservations($process){
        $jsonResponse = $this->apiClient->get(self::findObservationURL.$process);
        return $jsonResponse;
    }

    public function sendProcessObservation(Workflow $workflow){
        $data = [
            "processInstanceId" => intval($workflow->processInstanceId),
            "stateSequence" => intval($workflow->stateSequence),
            "threadSequence" => intval($workflow->threadSequence),
            "observation" => $workflow->observation
        ];

        $response = $this->apiClient->post(self::createProcessObservation, $data);

        return $response;
    }
    
}