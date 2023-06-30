<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue419Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testCssImport()
	{
		$html = '<style>
			@import url("http://localhost/css/theme1.css?yoloswag");
			@import "http://localhost/css/theme2.css?yoloswag";
			@import url("http://localhost/css/theme3.css");
			@import "http://localhost/css/theme4.css";
			@import "//localhost/css/theme5.css"
		</style>';

		$this->mpdf->WriteHtml($html);
	}

}
