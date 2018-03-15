<?php
require __DIR__.'/vendor/autoload.php';

/**
 * Get our build settings from drone
 */
$build = new \DronePluginSdk\Build();

/**
 * Instantiate saltstack client
 */
$saltClient = new \SaltApi\SaltClient(
  $build->getSecret('saltapi_host'),
  $build->getSecret('saltapi_port'),
  $build->getSecret('saltapi_user'),
  $build->getSecret('saltapi_pass'),
  $build->getSecret('saltapi_eauth'),
  false
);


var_dump($saltClient->run(
    $build->getPluginParameter('target'),
    $build->getPluginParameter('module'),
    $build->getPluginParameter('args')
));
