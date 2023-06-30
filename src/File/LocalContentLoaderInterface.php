<?php

namespace UFO\Mpdf\File;

interface LocalContentLoaderInterface
{

	/**
	 * @return string|null
	 */
	public function load($path);

}
