<?php

namespace Issues;

class Issue637Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testEnableImportWithNoPdfImported()
	{
		$this->mpdf->enableImports = true;
		$this->mpdf->WriteHTML('<div>Content</div>');
		$output = $this->mpdf->Output('', 'S');
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
