<?php
/**
 * @file
 * Contains \Drupal\hello_block\Routing\RouteSubscriber.
 */
namespace Drupal\hello_block\Routing;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\DependencyInjection\Definition;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {
  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    $abc = new Definition();
    var_dump($abc->getTag('event_subscriber'));
    // Change path '/user/login' to '/login'.
   //var_dump($collection->get('hello_block.entityView'));
    if ($route = $collection->get('user.login')) {
      $route->setPath('/login');
    }
    // Always deny access to '/user/logout'.
    // Note that the second parameter of setRequirement() is a string.
    if ($route = $collection->get('user.logout')) {
      $route->setRequirement('_access', 'FALSE');
      //drupal_set_message(t('message'), 'status', FALSE);
    }
  }
}