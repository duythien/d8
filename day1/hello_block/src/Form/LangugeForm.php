<?php
/**
 * @file
 * Contains \Drupal\hello_block\Form\LangugeForm.
 */

namespace Drupal\hello_block\Form;

use Drupal\Core\Form\FormInterface;

/**
 * File test form class.
 */
class LangugeForm implements FormInterface {

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormID() {
    return 'hello_block';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, array &$form_state) {
    $form['intro'] = array(
      '#markup' => t('Use this form to send a message to an e-mail address. No spamming!'),
    );
    $form['ip'] = array(
      '#type' => 'textfield',
      '#title' => t('IP address'),
      '#required' => TRUE,
    );
    
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * Form validation handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   */
  public function validateForm(array &$form, array &$form_state) {
    if (!valid_email_address($form_state['values']['email'])) {
      form_set_error('email', t('That e-mail address is not valid.'));
    }
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param array $form_state
   *   An associative array containing the current state of the form.
   */
  public function submitForm(array &$form, array &$form_state) {
    //hello_block_mail_send($form_state['values']);
    dms($form);
  }
}
