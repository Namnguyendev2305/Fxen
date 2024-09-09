<?php

namespace VNXF\Imgur\Pub\Controller;
use XF\Mvc\ParameterBag;

class Attachment extends XFCP_Attachment
{
	public function actionImgur(ParameterBag $params) {
		$options = \XF::options();	
		$repo = $this->repository('VNXF\Imgur:Attach');
		$attachment = $a = array();
		if(isset($_FILES['attachment'])) {
			$files = array_filter($_FILES['attachment']['name']);
			$total_count = count($_FILES['attachment']['name']);
			for($i=0; $i<$total_count; $i++ ) {
			   $a['name'] = $_FILES['attachment']['name'][$i];
			   $a['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
			   $attachment[] = $repo->upload_imgur($a);
			}			
		}
		$show = array(
			'attachment' => $attachment,
		);
		return $this->view('VNXF\Imgur:Imgur', 'vnxf_imgur', $show);
	}
}