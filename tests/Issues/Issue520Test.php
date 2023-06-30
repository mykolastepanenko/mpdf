<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue520Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testDollarInFooterCoreFonts()
	{
		$this->mpdf->setCompression(false);
		$this->mpdf->setHtmlFooter('$123.45');

		$out = $this->mpdf->output('', 'S');

		$this->assertStringContainsString('$123.45', $out);
	}

}
