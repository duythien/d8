<?php
/**
 * @file
 * Contains \Drupal\hello_block\Controller\SimpleCallback.
 */
namespace Drupal\hello_block\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleCallback extends ControllerBase
{

    public function noArgumentAction(){
        return [
            '#markup' => 'hello_block Simple Callback!'
        ];
    }
    public function callbackArgumentAction($a1,$a2 = 'Vietnam'){
        return [
            '#prefix' => '<pre>',
            '#markup' => print_r([$a1, $a2], true),
            '#suffix' => '</pre>',
        ];
    }

}
//