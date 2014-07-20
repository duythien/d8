<?php
/**
 * @file
 * Contains \Drupal\hello_block\Routing\ExampleRoutes.
 */
namespace Drupal\hello_block\Routing;
use Symfony\Component\Routing\Route;
/**
 * Defines dynamic routes.
 */
class ExampleRoutes {
  /**
   * {@inheritdoc}
   */
  public function routes() {
    $routes = array();
    // Declares a single route under the name 'hello_block.content'.
    // Returns an array of Route objects.
    $routes['hello_block.content'] = new Route(
      // Path to attach this route to:
      '/hello-block',
      // Route defaults:
      array(
        '_content' => '\Drupal\hello_block\Controller\HelloBlockController::contentAction',
        '_title' => 'Hello'
      ),
      // Route requirements:
      array(
        '_permission'  => 'access content',
      )
    );
    return $routes;
  }
}
?>