var $jts = jQuery.noConflict();
$jts(document).ready(function () {

if ($jts.browser.msie && $jts.browser.version < 7) return; // Don't execute code if it's IE6 or below cause it doesn't support it.

  $jts(".fade").fadeTo(1, 1);
  $jts(".fade").hover(
    function () {
      $jts(this).fadeTo("fast", 0.43);
    },
    function () {
      $jts(this).fadeTo("slow", 1);
    }
  );
});
