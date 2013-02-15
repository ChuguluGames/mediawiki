<?php

/**
* Extension:Smblinks - convert file:///// links to smb:// links and vice versa
* 
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* @author Daniel Schürmann <daschue@gmx.de>
* @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
*/

$wgExtensionCredits['other'][] = array(
'path'			=> __FILE__,
'name'			=> 'SmbLinks',
'url'			=> 'http://mediawiki.org/wiki/Extension:SmbLinks',
'description'	=> 'convert file:///// links to smb:// links and vice versa',
'author'		=> '[mailto:daschuer@gmx.de Daniel Schürmann]',
);

// Restrict link removal to anons only
$wgRRAnonOnly = false;

// Hook Registering
$wgHooks['LinkEnd'][] = 'fnSmbLinks';

// And the function
function fnSmbLinks( $skin, $target, $options, &$text, &$attribs, &$ret ) {
// Auslesen der Betriebssysteme
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if(   strstr($user_agent, "Windows 95")
|| strstr($user_agent, "Windows 98")
|| strstr($user_agent, "NT 4.0")
|| strstr($user_agent, "NT 5.0")
|| strstr($user_agent, "NT 5.1")
|| strstr($user_agent, "Win")
){
$attribs = str_replace("smb://", "file://///", $attribs);
}
elseif(    strstr($user_agent, "Linux")
|| strstr($user_agent, "Mac")
){
$attribs = str_replace("file://///", "smb://", $attribs);

}
//	elseif(    strstr($user_agent, "FreeBSD")
//		|| strstr($user_agent, "SunOS")
//		|| strstr($user_agent, "IRIX")
//		|| strstr($user_agent, "BeOS")
//		|| strstr($user_agent, "OS/2")
//		|| strstr($user_agent, "AIX")
//		|| strstr($user_agent, "Unix")
//	){
//		Todo ...
//
//	}	

// Workaround for lcations with spacees (%20) 
// Spaces must be replaces with %_
$attribs = str_replace("%25_", "%20", $attribs);

return true;
}