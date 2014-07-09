<?php

/**
 * @file
 * Definition of Drupal\hello_block\Tests\HelloBlockTest.
 */

namespace Drupal\hello_block\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Testing the Hello Block module.
 *
 * @ingroup hello_block
 */
class HelloBlockTest extends WebTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('block', 'hello_block');

  protected $WebUser;

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'Hello Block functionality',
      'description' => 'Test the configuration options and block created by Hello Block module.',
      'group' => 'Examples',
    );
  }

  /**
   * Enable modules and create user with specific permissions.
   */
  public function setUp() {
    parent::setUp();
    // Create user.
    $this->WebUser = $this->drupalCreateUser(array('administer blocks'));
  }

  /**
   * Tests hello_block functionality.
   */
  

}
