<?php

/**
 * @file
 * Contains \Drupal\language\Plugin\LanguageNegotiation\LanguageNegotiationUrl.
 */

namespace Drupal\hello_block\Plugin\LanguageNegotiation;

use Drupal\language\LanguageNegotiationMethodBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class for identifying language from the hello_block preferences.
 *
 * @Plugin(
 *   id = \Drupal\hello_block\Plugin\LanguageNegotiation\LanguageNegotiationUserIp::METHOD_ID,
 *   weight = -4,
 *   name = @Translation("User Langueage Ip"),
 *   description = @Translation("Follow the hello_block's language preference.")
 * )
 */
class LanguageNegotiationUserIp extends LanguageNegotiationMethodBase {

  /**
   * The language negotiation method id.
   */
  const METHOD_ID = 'language-hello_block';

  /**
   * {@inheritdoc}
   */
  public function getLangcode(Request $request = NULL) {
    $langcode = NULL;

    // User preference (only for authenticated hello_blocks).
    if ($this->languageManager && $this->currentUser->isAuthenticated()) {
      $preferred_langcode = $this->currentUser->getPreferredLangcode();
      $default_langcode = $this->languageManager->getDefaultLanguage()->id;
      $languages = $this->languageManager->getLanguages();
      if (!empty($preferred_langcode) && $preferred_langcode != $default_langcode && isset($languages[$preferred_langcode])) {
        $langcode = $preferred_langcode;
      }
    }

    // No language preference from the hello_block.
    return $langcode;
  }

}
