<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue554Test extends \Mpdf\BaseMpdfTest
{

	public function testDollarInHeaderCoreFonts()
	{
		$this->mpdf->setCompression(false);
		$this->mpdf->setHtmlHeader('$123.45');

		$out = $this->mpdf->output('', 'S');

		$this->assertStringContainsString('$123.45', $out);
	}

}
