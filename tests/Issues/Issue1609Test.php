<?php

namespace Issues;

use UFO\Mpdf\MpdfImageException;

class Issue1609Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testNoPngError()
	{
		$this->mpdf->WriteHTML('<img src="' . __DIR__ . '/../data/img/issue1609.png">');

		$output = $this->mpdf->output('', 'S');
		$this->assertStringStartsWith('%PDF-', $output);
	}

	public function testPngException()
	{
		$this->expectException(MpdfImageException::class);
		$this->expectExceptionMessageMatches('/Error creating GD image from PNG file/');

		$this->mpdf->debug = true;
		$this->mpdf->WriteHTML('<img src="' . __DIR__ . '/../data/img/issue1609.png">');
	}

}
