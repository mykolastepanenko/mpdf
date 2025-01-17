<?php

namespace Issues;

use UFO\Mpdf\Output\Destination;

class Issue872Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testSetHeader()
	{
		$this->mpdf->SetHeader([
			'Not empty array'
		]);

		$this->mpdf->SetHeader([
			'Not empty array'
		], 'O');

		$output = $this->mpdf->Output('', Destination::STRING_RETURN);
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
