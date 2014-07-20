<?php

/**
 * @file
 * Contains Drupal\config_entity_example\Form\RobotEditForm.
 */

namespace Drupal\config_entity_example\Form;

/**
 * Class RobotEditForm
 *
 * Provides the edit form for our Robot entity.
 *
 * @package Drupal\config_entity_example\Form
 *
 * @ingroup config_entity_example
 */
class RobotEditForm extends RobotFormBase {

  /**
   * Returns the actions provided by this form.
   *
   * For the edit form, we only need to change the text of the submit button.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   *
   * @return array
   *   An array of supported actions for the current entity form.
   */
  protected function actions(array $form, array &$form_state) {
    $actions = parent::actions($form, $form_state);
    $actions['submit']['#value'] = t('Update Robot');
    return $actions;
  }

}
