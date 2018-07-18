<?php

/**
 * Provide a admin and frontend view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://lenscapades.com
 * @since      1.0.0
 *
 * @package    Lenscapades_cookie_consent
 * @subpackage Lenscapades_cookie_consent/public/partials
 */
?>

<h1><?php echo $declaration->content['dialog-heading']; ?></h1>
<p><?php echo $declaration->content['dialog-body-text']; ?></p>

<div class="tab">
  <button class="tablinks" id="dialogTab1"><?php echo $declaration->content['cookie-declaration-title']; ?></button>
  <button class="tablinks" id="dialogTab2"><?php echo $declaration->content['general-cookie-introduction-title']; ?></button>
</div>

<div id="cookieDescription" class="tabcontent">

<div class="verticaltab">
  <button class="verticaltablinks" id="dialogVTab1">
    <?php echo $declaration->content['necessary-cookies-category-title']; ?>
  </button>
  <button class="verticaltablinks" id="dialogVTab2">
    <?php echo $declaration->content['preferences-cookies-category-title']; ?>
  </button>
  <button class="verticaltablinks" id="dialogVTab3">
    <?php echo $declaration->content['statistics-cookies-category-title']; ?>
  </button>
  <button class="verticaltablinks" id="dialogVTab4">
    <?php echo $declaration->content['marketing-cookies-category-title']; ?>
  </button>
</div>

<div id="Necessary" class="verticaltabcontent">
  <p><?php echo $declaration->content['necessary-cookies-introduction']; ?></p>
  <p><?php echo $declaration->cookies_by_class['essential']; ?></p>
</div>

<div id="Preferences" class="verticaltabcontent">
  <p><?php echo $declaration->content['preferences-cookies-introduction']; ?></p>
</div>

<div id="Statistics" class="verticaltabcontent">
  <p><?php echo $declaration->content['statistics-cookies-introduction']; ?></p>
</div>

<div id="Marketing" class="verticaltabcontent">
  <p><?php echo $declaration->content['marketing-cookies-introduction']; ?></p>
</div>

</div>

<div id="generalCookieIntroduction" class="tabcontent">
  <p><?php echo $declaration->content['general-cookie-introduction']; ?></p>
</div>
