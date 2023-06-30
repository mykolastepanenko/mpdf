<?php

namespace UFO\Mpdf\Tag;

class Pre extends BlockTag
{

	public function open($attr, &$ahtml, &$ihtml)
	{
		$this->mpdf->ispre = true; // ADDED - Prevents left trim of textbuffer in printbuffer()
		parent::open($attr, $ahtml, $ihtml); // TODO: Change the autogenerated stub
	}
}
