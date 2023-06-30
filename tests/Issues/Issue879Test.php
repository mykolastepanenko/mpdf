<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue879Test extends \Mpdf\BaseMpdfTest
{
	protected function set_up()
	{
		parent::set_up();

		$this->mpdf = new Mpdf([

		]);
	}

	public function testOtlPhpNotice()
	{
		$str = 'تجربة 5%';
		$this->mpdf->WriteHTML('<p>' . $str . '<br /></p>');

		$output = $this->mpdf->output('', 'S');
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
