<?php

/**
 *****
 *
 * @link       https://lenscapades.com
 * @since      1.0.0
 *
 * @package    Lenscapades_cookie_consent
 * @subpackage Lenscapades_cookie_consent/public/partials
 */

$content = $declaration->content;
$auto = $declaration->auto;

$necessary = $declaration->cookiesByClass['essential'];
$preferences = $declaration->cookiesByClass['functional'];
$statistics = $declaration->cookiesByClass['analytical'];
$marketing = $declaration->cookiesByClass['3rd-party'];
?>



<section role="body">
  <p>
    <a href="#" id="renewConsent"><?php echo $auto->renewConsent; ?></a> 
    <a href="#" id="withdrawConsent"><?php echo $auto->withdrawConsent; ?></a>
  </p>

  <p><?php echo $content->dialogBodyText; ?></p>
  <?php echo $content->generalCookieIntroduction; ?>
  <p><?php echo $auto->cookieDomains; ?> <?php echo LENSCAPADES_COOKIE_CONSENT_COOKIE_DOMAIN; ?></p>
  <p><?php echo $auto->consentState; ?></p>
  <p><?php echo $auto->declatationUpdated; ?></p>

</section>

    