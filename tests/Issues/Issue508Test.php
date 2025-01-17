<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue508Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testHrInTable()
	{
		$html = '<table><hr></table>';

		$this->mpdf->ignore_table_percents = false;

		$this->mpdf->setCompression(false);
		$this->mpdf->WriteHtml($html);

		$out = $this->mpdf->Output('', 'S');
		$this->assertGreaterThan(0, strlen($out));
	}

}
