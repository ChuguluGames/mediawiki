<?php
if ( !defined( 'MEDIAWIKI' ) ) {
    echo "This file is not a valid entry point.";
    exit( 1 );
}

$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'other'][] = array(
	'path' => __FILE__,
        'name' => 'Semantic Bundle',
        'description' => 'A pre-packaged bundle of extensions meant to be used on wikis based around the Semantic MediaWiki extension.',
	'version' => '2011-03-29.20110329',
        'author' => array( '[http://www.mediawiki.org/wiki/User:Sergey_Chernyshev Sergey Chernyshev]', '[http://www.mediawiki.org/wiki/User:Yaron_Koren Yaron Koren]', '[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]' ),
        'url' => 'http://www.mediawiki.org/wiki/Semantic_Bundle'
);

