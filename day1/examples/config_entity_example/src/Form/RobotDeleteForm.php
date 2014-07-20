<?php

/**
 * @file
 * Contains Drupal\config_entity_example\Form\RobotDeleteForm.
 */

namespace Drupal\config_entity_example\Form;

use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Url;

/**
 * Class RobotDeleteForm.
 *
 * Provides a confirm form for deleting the entity. This is different from the
 * add and edit forms as it does not inherit from RobotFormBase. The reason for
 * this is that we do not need to build the same form. Instead, we present the
 * user with a simple yes/no question. For this reason, we derive from
 * EntityConfirmFormBase instead.
 *
 * @package Drupal\config_entity_example\Form
 *
 * @ingroup config_entity_example
 */
class RobotDeleteForm extends EntityConfirmFormBase {

  /**
   * Gathers a confirmation question.
   *
   * The question is used as a title in our confirm form. For delete confirm
   * forms, this typically takes the form of "Are you sure you want to
   * delete...", including the entity label.
   *
   * @return string
   *   Translated string.
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete robot %label?', array(
      '%label' => $this->entity->label(),
    ));
  }

  /**
   * Gather the confirmation text.
   *
   * The confirm text is used as a the text in the button that confirms the
   * question posed by getQuestion().
   *
   * @return string
   *   Translated string.
   */
  public function getConfirmText() {
    return $this->t('Delete Robot');
  }

  /**
   * Gets the cancel route.
   *
   * Provides the route name to go to if the user cancels the action. For entity
   * delete forms, this is typically the route that points at the list
   * controller.
   *
   * @return array
   *   The route to go to if the user cancels the deletion. The key is
   *   'route_name'. The value is the route name.
   */
  public function getCancelRoute() {
    return new Url('robot.list');
  }

  /**
   * The submit handler for the confirm form.
   *
   * For entity delete forms, you use this to delete the entity in
   * $this->entity.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   */
  public function submit(array $form, array &$form_state) {
    // Delete the entity.
    $this->entity->delete();

    // Set a message that the entity was deleted.
    drupal_set_message(t('Robot %label was deleted.', array(
      '%label' => $this->entity->label(),
    )));

    // Redirect the user to the list controller when complete.
    $form_state['redirect_route']['route_name'] = 'robot.list';
  }

}
