<?php

namespace Issues;

use UFO\Mpdf\Mpdf;

class Issue421Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testCleanupMethod()
	{
		$this->assertSame('🐙', mb_substr('🐙', 0, 1));

		$mpdf = new \Mpdf\Mpdf(['mode' => 'c']);
		$mpdf->WriteHTML('');

		$mpdf->cleanup();

		$this->assertSame('🐙', mb_substr('🐙', 0, 1));
	}

}
