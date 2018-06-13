<?php

require __DIR__. '/../vendor/autoload.php';

$dataset = new \PedroLazari\PhpFluig\Model\Dataset;
$datasetService = new \PedroLazari\PhpFluig\Service\DatasetService;

$service = new \PedroLazari\PhpFluig\Service\WorkflowService();

$dataset->setName("colleague");

$json = $datasetService->getDataset($dataset);

//$json = $service->findObservations('93900');

//echo $json;
$workflow = new \PedroLazari\PhpFluig\Model\Workflow();

$workflow->processInstanceId = '92692';
$workflow->threadSequence = "2";
$workflow->stateSequence = "4";
$workflow->observation = "Esta mensagem é um teste de API";

$json = $service->sendProcessObservation($workflow);

echo $json;