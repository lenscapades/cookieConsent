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

$content = $declaration->content;

$necessary = $declaration->cookiesByClass['essential'];
$preferences = $declaration->cookiesByClass['functional'];
$statistics = $declaration->cookiesByClass['analytical'];
$marketing = $declaration->cookiesByClass['3rd-party'];
?>

<section role="banner">
  <div>
  <h1><?php echo $content->dialogHeading; ?></h1>
    <div>
      <button class="button">Ok</button>
    </div>
  </div>
</section>

<section role="body">
  <p><?php echo $content->dialogBodyText; ?></p>
</section>

    <label class="switch">
      <div>
        <?php echo $content->necessaryCookiesCategoryTitle; ?>
      </div>
      <input type="checkbox">
      <div class="switch-btn"></div>
    </label>

    <label class="switch">
      <div>
        <?php echo $content->preferencesCookiesCategoryTitle; ?>
      </div>
      <input type="checkbox">
      <div class="switch-btn"></div>
    </label>

<label class="switch">
  <div>
    <?php echo $content->statisticsCookiesCategoryTitle; ?>
  </div>
  <input type="checkbox">
  <div class="switch-btn"></div>
</label>

<label class="switch">
  <div>
    <?php echo $content->marketingCookiesCategoryTitle; ?>
  </div>
  <input type="checkbox">
  <div class="switch-btn"></div>
</label>

<div style="clear:both">
<button id="LenscapadesCookieDialogBodyLevelDetailsButton">Details</button>
</div>

<div id="LenscapadesCookieDialogDetails">

<div class="tab">
  <button data-rel="cookieDescription" class="tablinks" id="dialogTab1"><?php echo $content->cookieDeclarationTitle; ?></button>
  <button data-rel="generalCookieIntroduction" class="tablinks" id="dialogTab2"><?php echo $content->generalCookieIntroductionTitle; ?></button>
</div>

<div class="drawer">
  <button data-rel="cookieDescription" class="tablinks" id="dialogDrawer1"><?php echo $content->cookieDeclarationTitle; ?></button>
</div>

<div id="cookieDescription" class="tabcontent">

<div class="verticaltab">
  <button class="verticaltablinks" id="dialogVTab1">
    <?php echo $content->necessaryCookiesCategoryTitle; ?>
  </button>
  <button class="verticaltablinks" id="dialogVTab2">
    <?php echo $content->preferencesCookiesCategoryTitle; ?>
  </button>
  <button class="verticaltablinks" id="dialogVTab3">
    <?php echo $content->statisticsCookiesCategoryTitle; ?>
  </button>
  <button class="verticaltablinks" id="dialogVTab4">
    <?php echo $content->marketingCookiesCategoryTitle; ?>
  </button>
</div>

<div id="Necessary" class="verticaltabcontent">
  <p><?php echo $content->necessaryCookiesIntroduction; ?></p>
  <p><?php echo $necessary; ?></p>
</div>

<div id="Preferences" class="verticaltabcontent">
  <p><?php echo $content->preferencesCookiesIntroduction; ?></p>
  <p><?php echo $preferences; ?></p>
</div>

<div id="Statistics" class="verticaltabcontent">
  <p><?php echo $content->statisticsCookiesIntroduction; ?></p>
  <p><?php echo $statistics; ?></p>
</div>

<div id="Marketing" class="verticaltabcontent">
  <p><?php echo $content->marketingCookiesIntroduction; ?></p>
  <p><?php echo $marketing; ?></p>
</div>

</div>

<div class="drawer drawer_last">
  <button data-rel="generalCookieIntroduction" class="tablinks" id="dialogDrawer2"><?php echo $content->generalCookieIntroductionTitle; ?></button>
</div>

<div id="generalCookieIntroduction" class="tabcontent">
  <p><?php echo $content->generalCookieIntroduction; ?></p>
</div>

</div> <!-- details -->
