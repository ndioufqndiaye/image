<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.Gz52wGN' shared service.

return $this->privates['.service_locator.Gz52wGN'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'App\\Controller\\ImageController::image' => ['privates', '.service_locator.H3qnu8f', 'get_ServiceLocator_H3qnu8fService.php', true],
    'App\\Controller\\MonController::Partenaire' => ['privates', '.service_locator.H3qnu8f', 'get_ServiceLocator_H3qnu8fService.php', true],
    'App\\Controller\\ImageController:image' => ['privates', '.service_locator.H3qnu8f', 'get_ServiceLocator_H3qnu8fService.php', true],
    'App\\Controller\\MonController:Partenaire' => ['privates', '.service_locator.H3qnu8f', 'get_ServiceLocator_H3qnu8fService.php', true],
], [
    'App\\Controller\\ImageController::image' => '?',
    'App\\Controller\\MonController::Partenaire' => '?',
    'App\\Controller\\ImageController:image' => '?',
    'App\\Controller\\MonController:Partenaire' => '?',
]);
