<?php
switch (get_option('wpts-slider')) {
	case 'cycle':
		include("generate-slider/cycleslider.php");
	break;
	case 'coin':
		include("generate-slider/coinslider.php");
	break;
	case 'piecemaker':
		include("generate-slider/piecemakerslider.php");
	break;
}

?>