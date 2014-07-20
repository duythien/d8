<?php

/**
 * @file
 * Contains \Drupal\hello_block\Plugin\Block\IplangBlock.
 */

namespace Drupal\hello_block\Plugin\Block;

use Drupal\block\Annotation\Block;
use Drupal\block\BlockBase;
use Drupal\Core\Annotation\Translation;

/**
 * Provides a 'Example: configurable text string' block.
 *
 * @Block(
 *   id = "iplang",
 *   subject = @Translation("Title of first block (iplang)"),
 *   admin_label = @Translation("Title of first block (iplang)")
 * )
 */
class IplangBlock extends BlockBase {

  /**
   * Overrides \Drupal\block\BlockBase::defaultConfiguration().
   */
  public function defaultConfiguration() {
    return array(
      'hello_block_string' => t('A default value. This block was created at %time', array('%time' => date('c'))),
    );
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockForm().
   */
  public function blockForm($form, &$form_state) {
    $form['hello_block_string_text'] = array(
      '#type' => 'textfield',
      '#title' => t('Block contents'),
      '#size' => 60,
      '#description' => t('This text will appear in the example block.'),
      '#default_value' => $this->configuration['hello_block_string'],
    );
    return $form;
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockSubmit().
   */
  public function blockSubmit($form, &$form_state) {
    $this->configuration['hello_block_string'] = $form_state['values']['hello_block_string_text'];
  }

  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->configuration['hello_block_string'],
    );
  }

}
