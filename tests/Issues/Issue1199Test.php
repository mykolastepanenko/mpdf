<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue1199Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testUndefinedVariableInFooter()
	{
		$mpdf = new Mpdf([
			'printers_info' => true,
		]);

		$mpdf->WriteHTML('some html');
		$mpdf->Output('', 'S');

		$output = $this->mpdf->Output('', 'S');
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
