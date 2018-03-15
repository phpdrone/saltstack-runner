<?php
require __DIR__.'/vendor/autoload.php';

/**
 * Get our build settings from drone
 */
$build = new \DronePluginSdk\Build();

/**
 * Instantiate saltstack client
 */
$saltClient = new \naegelin\saltapi\SaltClient(
  $build->getSecret('saltapi_url'),
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
