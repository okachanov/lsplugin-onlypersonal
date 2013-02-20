<?php
//
//  Only personal topics
//  (P) rafrica.net team, 2010
//  http://we.rafrica.net/
//

if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginOnlypersonal extends Plugin {
	
	public function Activate() {
		return true;
	}
	
	public function Init() {
	}
	
	protected $aInherits=array(
       'module'  => array('ModuleTopic' => 'PluginOnlypersonal_ModuleTopic')
    );
	
}

?>