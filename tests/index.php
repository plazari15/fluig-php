<?php

require __DIR__. '/../vendor/autoload.php';

$dataset = new \PedroLazari\PhpFluig\Model\Dataset;
$datasetService = new \PedroLazari\PhpFluig\Service\DatasetService;

$service = new \PedroLazari\PhpFluig\Service\WorkflowService();

$dataset->setName("colleague");

//$json = $datasetService->getDataset($dataset);

$json = $service->findObservations('93900');

echo $json;