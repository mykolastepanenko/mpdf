<?php

namespace UFO\Mpdf\File;

class LocalContentLoader implements \UFO\Mpdf\File\LocalContentLoaderInterface
{

	public function load($path)
	{
		return file_get_contents($path);
	}

}
