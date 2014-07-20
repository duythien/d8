<?php

/**
 * @file
 * Contains \Drupal\hello_block\Controller\HelloBlockController.
 */

namespace Drupal\hello_block\Controller;

use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller routines for hello block routes.
 */
class HelloBlockController {

  /**
   * A simple controller method to explain what the block example is about.
   */
  public function description() {
    $build = array(
      '#markup' => t('The Hello Block provides three sample blocks which demonstrate the various block APIs. To experiment with the blocks, enable and configure them on <a href="@url">the block admin page</a>.', array('@url' => url('admin/structure/block'))),
    );

    return $build;
  }
  /**
   * A simple controller method to explain what the block example is about.
   */
  public function todo() {
    $build = array(
      '#markup' => t('The Hello Block provides three sample blocks which demonstrate the various block APIs. To experiment with the blocks, enable and configure them on <a href="@url">the block admin page</a>.', array('@url' => url('admin/structure/block'))),
    );

    return $build;
  }

  /**
   * A simple controller method to explain what the block example is about.
   */
  public function contentAction() {
    $build = array(
      '#markup' => t('My Content'),
    );

    return $build;
  }
  /**
   * Using parameters in routes 
   */
  public function userAction(AccountInterface $user, Request $request){
  	var_dump($user);
  	
  }
  public function controllerAction(){
  	$data[] = array(
      'id' => 1,
      'name' => 'Drupal 8',
    );
  	echo json_encode($data);
  }

}
