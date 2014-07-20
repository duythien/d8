<?php

/**
 * @file
 * Contains \Drupal\config_entity_example\RobotAccessController.
 */

namespace Drupal\config_entity_example;

use Drupal\Core\Entity\EntityAccessController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines an access controller for the robot entity.
 *
 * We set this class to be the access controller in Robot's entity annotation.
 *
 * @see \Drupal\config_entity_example\Entity\Robot
 *
 * @ingroup config_entity_example
 */
class RobotAccessController extends EntityAccessController {

  /**
   * {@inheritdoc}
   */
  public function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {
    // The $opereration parameter tells you what sort of operation access is
    // being checked for.
    if ($operation == 'view') {
      return TRUE;
    }
    // Other than the view operation, we're going to be insanely lax about
    // access. Don't try this at home!
    return parent::checkAccess($entity, $operation, $langcode, $account);
  }

}
