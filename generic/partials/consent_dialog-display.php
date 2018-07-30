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
$auto = $declaration->auto;

$necessary = $declaration->cookiesByClass['essential'];
$preferences = $declaration->cookiesByClass['functional'];
$statistics = $declaration->cookiesByClass['analytical'];
$marketing = $declaration->cookiesByClass['3rd-party'];
?>
<div class="LenscapadesCookieDialogWrapper">
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

    <label class="switch border">
      <div>
        <?php echo $content->necessaryCookiesCategoryTitle; ?>
      </div>
      <input type="checkbox">
      <div class="switch-button"></div>
    </label>

    <label class="switch border">
      <div>
        <?php echo $content->preferencesCookiesCategoryTitle; ?>
      </div>
      <input type="checkbox">
      <div class="switch-button"></div>
    </label>

<label class="switch border">
  <div>
    <?php echo $content->statisticsCookiesCategoryTitle; ?>
  </div>
  <input type="checkbox">
  <div class="switch-button"></div>
</label>

<label class="switch">
  <div>
    <?php echo $content->marketingCookiesCategoryTitle; ?>
  </div>
  <input type="checkbox">
  <div class="switch-button"></div>
</label>

<div class="button-wrapper">
<button id="LenscapadesCookieDialogBodyLevelDetailsButton"><?php echo $auto->showDetails; ?></button>
</div>

<div class="submit-button-wrapper">
  <button>Ok</button>
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
  <?php echo $necessary; ?>
</div>

<div id="Preferences" class="verticaltabcontent">
  <p><?php echo $content->preferencesCookiesIntroduction; ?></p>
  <?php echo $preferences; ?>
</div>

<div id="Statistics" class="verticaltabcontent">
  <p><?php echo $content->statisticsCookiesIntroduction; ?></p>
  <?php echo $statistics; ?>
</div>

<div id="Marketing" class="verticaltabcontent">
  <p><?php echo $content->marketingCookiesIntroduction; ?></p>
  <?php echo $marketing; ?>
</div>

</div>

<div class="drawer">
  <button data-rel="generalCookieIntroduction" class="tablinks" id="dialogDrawer2"><?php echo $content->generalCookieIntroductionTitle; ?></button>
</div>

<div id="generalCookieIntroduction" class="tabcontent">
  <?php echo $content->generalCookieIntroduction; ?>
</div>

</div> <!-- details -->
</div> <!-- LenscapadesCookieDialogWrapper -->