<?php
//
//  Only personal topics
//  (P) rafrica.net team, 2010
//  http://we.rafrica.net/
//

class PluginOnlypersonal_ModuleTopic extends PluginOnlypersonal_Inherit_ModuleTopic{
	
	public function GetTopicsPersonalByUser($sUserId,$iPublish,$iPage,$iPerPage) {
		$aFilter=array(			
			'topic_publish' => $iPublish,
			'user_id' => $sUserId,
			'blog_type' => array('personal'),
		);

		if($this->oUserCurrent && $this->oUserCurrent->getId()==$sUserId) {
			$aFilter['blog_type'][]='close';
		}		
		return $this->GetTopicsByFilter($aFilter,$iPage,$iPerPage);
	}
	
	public function GetCountTopicsPersonalByUser($sUserId,$iPublish) {
		$aFilter=array(			
			'topic_publish' => $iPublish,
			'user_id' => $sUserId,
			'blog_type' => array('personal'),
		);
		if($this->oUserCurrent && $this->oUserCurrent->getId()==$sUserId) {
			$aFilter['blog_type'][]='close';
		}		
		$s=serialize($aFilter);
		if (false === ($data = $this->Cache_Get("topic_count_user_{$s}"))) {			
			$data = $this->oMapperTopic->GetCountTopics($aFilter);
			$this->Cache_Set($data, "topic_count_user_{$s}", array("topic_update_user_{$sUserId}"), 60*60*24);
		}
		return 	$data;		
	}
}

?>