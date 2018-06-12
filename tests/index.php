<?php

require __DIR__. '/../vendor/autoload.php';

$dataset = new \PedroLazari\PhpFluig\Model\Dataset;
$datasetService = new \PedroLazari\PhpFluig\Service\DatasetService;

$dataset->setName("colleague");

$json = $datasetService->getDataset($dataset);

echo $json;