<?php

namespace UFO\Mpdf\Http;

use Psr\Http\Message\RequestInterface;

interface ClientInterface
{

	public function sendRequest(RequestInterface $request);

}
