<?php

namespace Issues;

use UFO\Mpdf\Mpdf;
use UFO\Mpdf\Output\Destination;

class Issue1765Test extends \UFO\Mpdf\BaseMpdfTest
{

	public function testTableWithNotValidRowspan()
	{
		$html = <<<HTML
<table>
	<tbody>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td rowspan="2"></td>
		</tr>
	</tfoot>
</table>
HTML;

		$this->mpdf->WriteHTML($html);

		$output = $this->mpdf->Output('', Destination::STRING_RETURN);
		$this->assertStringStartsWith('%PDF-', $output);
	}

}
