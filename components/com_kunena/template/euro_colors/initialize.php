<?php
/**
* Kunena Component
* @package Kunena.Template.Blue_Eagle
*
* @copyright (C) 2008 - 2015 Kunena Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.kunena.org
**/
defined( '_JEXEC' ) or die();

$app = JFactory::getApplication();
$document = JFactory::getDocument();
$template = KunenaFactory::getTemplate();

// Template requires Mootools 1.2 framework
$template->loadMootools();

// We load mediaxboxadvanced library only if configuration setting allow it
if ( KunenaFactory::getConfig()->lightbox == 1 ) {
	$template->addStyleSheet ( 'css/mediaboxAdv.css');
	$template->addScript( 'js/mediaboxAdv.js' );
}

// New Kunena JS for default template
$template->addScript ( 'js/default.js' );

$rtl = JFactory::getLanguage()->isRTL();
if ($rtl) {
	$template->addStyleSheet ( 'css/kunena.forum.rtl.css');
}

$skinner = $template->params->get('enableSkinner', 0);

if (is_file(JPATH_ROOT . "/templates/{$app->getTemplate()}/css/kunena.forum.css")) {
	// Load css from Joomla template
	CKunenaTools::addStyleSheet ( JUri::root(true). "/templates/{$app->getTemplate()}/css/kunena.forum.css" );
	if ($skinner && is_file(JPATH_ROOT. "/templates/{$app->getTemplate()}/css/kunena.skinner.css")){
		CKunenaTools::addStyleSheet ( JUri::root(true). "/templates/{$app->getTemplate()}/css/kunena.skinner.css" );
	} elseif (!$skinner && is_file(JPATH_ROOT. "/templates/{$app->getTemplate()}/css/kunena.default.css")) {
		CKunenaTools::addStyleSheet ( JUri::root(true). "/templates/{$app->getTemplate()}/css/kunena.default.css" );
	}
} else {
	$loadResponsiveCSS = $template->params->get('loadResponsiveCSS', 1);
	// Load css from default template
	$template->addStyleSheet ( 'css/kunena.forum.css' );
	if ($loadResponsiveCSS) $template->addStyleSheet ( 'css/kunena.responsive.css' );
	if ($skinner) {
		$template->addStyleSheet ( 'css/kunena.skinner.css' );
	} else {
		$template->addStyleSheet ( 'css/kunena.default.css' );
	}
}
$cssurl = JUri::root(true) . '/components/com_kunena/template/blue_eagle/css';
?>
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php echo $cssurl; ?>/kunena.forum.ie7.css" type="text/css" />
<![endif]-->
<?php
$mediaurl = JUri::root(true) . "/components/com_kunena/template/blue_eagle/media";

$styles = <<<EOF
	/* Kunena Custom CSS */
EOF;

$forumHeader = $template->params->get('forumHeadercolor', $skinner ? '' : '#0088CC');

if ($forumHeader) {
	$styles .= <<<EOF

	#Kunena div.kblock > div.kheader,#Kunena .kblock div.kheader { background: {$forumHeader} !important; border-bottom: 0 none; }
	#Kunena #ktop { border-color: {$forumHeader}; }
	#Kunena #ktop span.ktoggler { background: {$forumHeader}; }
	#Kunena #ktab a:hover,
	#Kunena #ktab li.Kunena-item-active a	{ background-color: {$forumHeader}; }
	#Kunena #ktab ul.menu li.active a { background-color: {$forumHeader}; }
	#Kunena a:link,
	#Kunena a:visited,
	#Kunena a:active {color: {$forumHeader};}
	#Kunena a:focus {outline: none;}
EOF;
}

$forumLink = $template->params->get('forumLinkcolor', $skinner ? '' : '#0088CC');

if ($forumLink) {
	$styles .= <<<EOF
	#Kunena a:link,
	#Kunena a:visited,
	#Kunena a:active {color: {$forumLink} !important;;}
	#Kunena a:focus {outline: none;}
EOF;
}

$announcementHeader = $template->params->get('announcementHeadercolor', $skinner ? '' : '#5388B4');

if ($announcementHeader) {
	$styles .= <<<EOF
	#Kunena div.kannouncement div.kheader { background: {$announcementHeader} !important; }
EOF;
}

$announcementBox = $template->params->get('announcementBoxbgcolor', $skinner ? '' : '#FFFF73');

if ($announcementBox) {
	$styles .= <<<EOF
	#Kunena div#kannouncement .kanndesc { background: {$announcementBox}; }
EOF;
}

$frontStatsHeader = $template->params->get('frontstatsHeadercolor', $skinner ? '' : '#0088CC');

if ($frontStatsHeader) {
	$styles .= <<<EOF
	#Kunena div.kfrontstats div.kheader { background: {$frontStatsHeader} !important; }
EOF;
}

$onlineHeader = $template->params->get('whoisonlineHeadercolor', $skinner ? '' : '#0088CC');

if ($onlineHeader) {
	$styles .= <<<EOF
	#Kunena div.kwhoisonline div.kheader { background: {$onlineHeader} !important; }
EOF;
}

$inactiveTab = $template->params->get('inactiveTabcolor', $skinner ? '' : '#66CCFF');

if ($inactiveTab) {
	$styles .= <<<EOF
	#Kunena #ktab a { background-color: {$inactiveTab} !important; }
EOF;
}

$activeTab = $template->params->get('activeTabcolor', $skinner ? '' : '#0088CC');

if ($activeTab) {
	$styles .= <<<EOF
	#Kunena #ktab ul.menu li.active a,#Kunena #ktab li#current.selected a { background-color: {$activeTab} !important; }
EOF;
}

$hoverTab = $template->params->get('hoverTabcolor', $skinner ? '' : '#0088CC');

if ($hoverTab) {
	$styles .= <<<EOF
	#Kunena #ktab a:hover { background-color: {$hoverTab} !important; }
EOF;
}

$topBorder = $template->params->get('topBordercolor', $skinner ? '' : '#0088CC');

if ($topBorder) {
	$styles .= <<<EOF
	#Kunena #ktop { border-color: {$topBorder} !important; }
EOF;
}

$inactiveFont = $template->params->get('inactiveFontcolor', $skinner ? '' : '#FFFFFF');

if ($inactiveFont) {
	$styles .= <<<EOF
	#Kunena #ktab a span { color: {$inactiveFont} !important; }
EOF;
}
$activeFont = $template->params->get('activeFontcolor', $skinner ? '' : '#FFFFFF');

if ($activeFont) {
	$styles .= <<<EOF
	#Kunena #ktab #current a span { color: {$activeFont} !important; }
EOF;
}

$toggleButton = $template->params->get('toggleButtoncolor', $skinner ? '' : '#0088CC');

if ($toggleButton) {
	$styles .= <<<EOF
	#Kunena #ktop span.ktoggler { background-color: {$toggleButton} !important; }
EOF;
}

$borderLightColor = $template->params->get('borderLightColor', $skinner ? '' : '#3399FF');

if ($borderLightColor) {
	$styles .= <<<EOF
	#Kunena td.kcol-mid { border-bottom-color: {$borderLightColor}; border-left-color: {$borderLightColor};}

	#Kunena td.kprofile-left {border-right-color: {$borderLightColor};}

	#Kunena td.kcol-first,
	#Kunena td.kprofile-left,
	#Kunena td.kprofile-right,
	#Kunena td.kbuttonbar-left,
	#Kunena td.kbuttonbar-right,
	#Kunena div.kmessage-editmarkup-cover,
	#Kunena div.kmsg-header
	{ border-bottom-color: {$borderLightColor};}

	#Kunena div.kblock div.kbody,
	#Kunena .klist-markallcatsread,
	#Kunena .klist-actions,
	#Kunena .klist-bottom
	{ border-color: {$borderLightColor};}

	#Kunena .kforum-pathway {border-right-color: {$borderLightColor}; border-left-color: {$borderLightColor};}
	#Kunena .klist-actions-forum,
	#Kunena .klist-times-all,
	#Kunena .klist-jump-all,
	#Kunena .klist-pages-all
	{border-left-color: {$borderLightColor};}

	.kunena-profile-bottom { border-bottom: 1px solid {$borderLightColor};}
EOF;
}

$borderDarkColor = $template->params->get('borderDarkColor', $skinner ? '' : '#0088CC');

if ($borderDarkColor) {
	$styles .= <<<EOF
	#Kunena div.kblock { border-bottom-color: {$borderDarkColor};}
EOF;
}

$alternateKunenaRow = $template->params->get('alternateKunenaRow', $skinner ? '' : '#FFFFF');

if ($alternateKunenaRow) {
	$styles .= <<<EOF
	#Kunena tr.krow1 td { background-color: {$alternateKunenaRow};}
EOF;
}

$breadcrumbsBackground = $template->params->get('breadcrumbsBackground', $skinner ? '' : '#FFFFF');

if ($alternateKunenaRow) {
	$styles .= <<<EOF
	#Kunena .kforum-pathway { background-color: {$breadcrumbsBackground};}
EOF;
}

$profileBgColor = $template->params->get('profileBgColor', $skinner ? '' : '#FFFFF');

if ($alternateKunenaRow) {
	$styles .= <<<EOF
	#Kunena td.kprofile-left,
	#Kunena td.kprofile-right,
	#Kunena td.kprofile-top,
	#Kunena td.kprofile-bottom { background-color: {$profileBgColor};}
	.kunena-profile-bottom { padding-bottom: 10px; padding-top: 10px; }
	.kunena-profile-bottom h3 { margin: 10px 0 5px;}
	.kunena-message h3, .kunena-profile-bottom h3, .kunena-message-top h3 { border-bottom: 1px solid #999999 !important; color: #999999; font-size: 10px; font-weight: bold; margin: 30px 0 5px; text-transform: uppercase;}

EOF;
}


$profileIcons = $template->getFile("media/iconsets/profile/{$template->params->get('profileIconset', 'default')}/default.png", true);
$buttonIcons = $template->getFile("media/iconsets/buttons/{$template->params->get('buttonIconset', 'default')}/default.png", true);
$editorIcons = $template->getFile("media/iconsets/editor/{$template->params->get('editorIconset', 'default')}/default.png", true);

$styles .= <<<EOF
	#Kunena .kicon-profile { background-image: url("{$profileIcons}"); }
	#Kunena .kicon-button { background-image: url("{$buttonIcons}") !important; }
	#Kunena #kbbcode-toolbar li a,#Kunena #kattachments a { background-image:url("{$editorIcons}"); }

	#Kunena .kblock div.kheader { border-bottom: 2px solid; padding: 5px 10px; }
	#Kunena div.kblock { border-width: 0 0 4px; }

	/* End of Kunena Custom CSS */
EOF;

$document->addStyleDeclaration($styles);
