<?php

namespace Issues;

use Mockery;
use UFO\Mpdf\Color\ColorConverter;
use UFO\Mpdf\Color\ColorModeConverter;
use UFO\Mpdf\Color\ColorSpaceRestrictor;
use UFO\Mpdf\CssManager;
use UFO\Mpdf\Image\ImageProcessor;
use UFO\Mpdf\Image\Svg;
use UFO\Mpdf\Language\LanguageToFont;
use UFO\Mpdf\Language\ScriptToLanguage;
use UFO\Mpdf\Otl;
use UFO\Mpdf\SizeConverter;

/**
 * Class Issue450Test
 * @author Antonio Norman - softcodex.ch
 */
class Issue450Test extends \Mpdf\BaseMpdfTest
{
	/**
	 * SVGs with global CSS styles, had the styles ignored
	 */
	public function testSvgWithGlobalStyles()
	{
		$otl = Mockery::mock(Otl::class);
		$cssManager = Mockery::mock(CssManager::class);
		$imageProcessor = Mockery::mock(ImageProcessor::class);
		$sizeConverter =  Mockery::mock(SizeConverter::class, [ 'convert' => 1 ]);
		$colorConverter = new ColorConverter(
			$this->mpdf,
			Mockery::mock(ColorModeConverter::class),
			Mockery::mock(ColorSpaceRestrictor::class)
		);
		$languageToFontInterface = Mockery::mock(LanguageToFont::class);
		$scriptToLanguageInterface = Mockery::mock(ScriptToLanguage::class);

		$svg = new Svg(
			$this->mpdf,
			$otl,
			$cssManager,
			$imageProcessor,
			$sizeConverter,
			$colorConverter,
			$languageToFontInterface,
			$scriptToLanguageInterface
		);

		// Load the SVG with the global styles
		$returnGlobalStyle = $svg->ImageSVG(
			file_get_contents(__DIR__ . '/../data/img/issue450_globalStyle.svg')
		);
		$this->assertNotFalse($returnGlobalStyle);

		// Load the SVG with the inline styles
		$returnInlineStyle = $svg->ImageSVG(
			file_get_contents(__DIR__ . '/../data/img/issue450_inlineStyle.svg')
		);
		$this->assertNotFalse($returnInlineStyle);

		// Check they are both the same!
		$this->assertEquals($returnGlobalStyle['data'], $returnInlineStyle['data']);

		Mockery::close();
	}

}
