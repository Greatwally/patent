<?php
$jsnutils	= JSNTplUtils::getInstance();
$doc		= $this->_document;

// Count module instances
$doc->hasRight		= $jsnutils->countModules('right');
$doc->hasLeft		= $jsnutils->countModules('left');
$doc->hasPromo		= $jsnutils->countModules('promo');
$doc->hasPromoLeft	= $jsnutils->countModules('promo-left');
$doc->hasPromoRight	= $jsnutils->countModules('promo-right');
$doc->hasInnerLeft	= $jsnutils->countModules('innerleft');
$doc->hasInnerRight	= $jsnutils->countModules('innerright');

// Define template colors
$doc->templateColors	= array('pink', 'red', 'green', 'brown', 'orange', 'cyan');

if (isset($doc->sitetoolsColorsItems))
{
	$this->_document->templateColors = $doc->sitetoolsColorsItems;
}

// Apply K2 style
if ($jsnutils->checkK2())
{
	$doc->addStylesheet($doc->templateUrl . "/ext/k2/jsn_ext_k2.css");
}

// Start generating custom styles
$customCss	= '';

// Process TPLFW v2 parameter
if (isset($doc->customWidth))
{
	if ($doc->customWidth != 'responsive')
	{
		$customCss .= '
	#jsn-page {
		min-width: ' . $doc->customWidth . ';
	}
	#jsn-pos-topbar,
	#jsn-header-top,
	#jsn-header-bottom-inner,
	#jsn-content,
	#jsn-promo-inner,
	#jsn-pos-content-top,
	#jsn-pos-promo_inner,
	#jsn-pos-content-bottom-over,
	#jsn-content-bottom-inner,
	#jsn-footer-inner {
		width: ' . $doc->customWidth . ';
	}';
	}
}

$doc->addStyleDeclaration(trim($customCss, "\n"));
