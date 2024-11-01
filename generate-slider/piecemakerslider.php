<?php
/**
 *  Copyright 2011-2012 TemplateAcess. (email: info@templateaccess.com)
 **/

$out = "";

$wptsConf['wpts-piecemaker-width']	= get_option('wpts-piecemaker-width') ? get_option('wpts-piecemaker-width') : 970;
$wptsConf['wpts-piecemaker-height']	= get_option('wpts-piecemaker-height') ? get_option('wpts-piecemaker-height') : 540;
$wptsConf['wpts-piecemaker-shadow']	= get_option('wpts-piecemaker-shadow') ? '' : 'NoShadow';

$out .= '
<div class="flash_slider">
    <div id="flashcontent">
      <p>You need to <a href="http://www.adobe.com/products/flashplayer/" target="_blank">upgrade your Flash Player</a> to version 10 or newer.</p>
    </div>
    <!-- end flashcontent -->
    <script type="text/javascript">
		var flashvars = {
			cssSource: "'.THIS_PLUGIN_URL.'/piecemaker/piecemakerXML.css",
			xmlSource: "'.THIS_PLUGIN_URL.'/piecemaker/piecemakerXML.php",
			imageSource: "/"
		  };
		var attributes = {};
		attributes.wmode = "transparent";
		swfobject.embedSWF("'.THIS_PLUGIN_URL.'/piecemaker/piecemaker'.$wptsConf['wpts-piecemaker-shadow'].'.swf", "flashcontent", "'.$wptsConf['wpts-piecemaker-width'].'", "'.$wptsConf['wpts-piecemaker-height'].'", "11.0", "'.THIS_PLUGIN_URL.'/scripts/swfobject/expressInstall.swf", flashvars, attributes);
	</script>
  </div>
  <!--/flash_slider -->
';

echo $out;
?>