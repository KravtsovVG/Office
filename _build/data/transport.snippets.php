<?php
/**
 * Add snippets to build
 * 
 * @package office
 * @subpackage build
 */

$snippets = array();

$tmp = array(
	'Office' => array(
		'file' => 'office'
		,'description' => ''
	),
	'officeProfile' => array(
		'file' => 'office.profile'
		,'description' => ''
	),
	'officeAuth' => array(
		'file' => 'office.auth'
		,'description' => ''
	),
	'officeRemoteAuth' => array(
		'file' => 'office.remote_auth'
		,'description' => ''
	),
	'officeRemoteServer' => array(
		'file' => 'office.remote_server'
		,'description' => ''
	),
);

foreach ($tmp as $k => $v) {
	/* @var modSnippet $snippet */
	$snippet = $modx->newObject('modSnippet');
	$snippet->fromArray(array(
		'id' => 0
		,'name' => $k
		,'description' => @$v['description']
		,'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.'.$v['file'].'.php')
		,'static' => BUILD_SNIPPET_STATIC
		,'source' => 1
		,'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/snippets/snippet.'.$v['file'].'.php'
	),'',true,true);

	$properties = include $sources['build'].'properties/properties.'.$v['file'].'.php';
	$snippet->setProperties($properties);

	$snippets[] = $snippet;
}

unset($tmp, $properties);
return $snippets;