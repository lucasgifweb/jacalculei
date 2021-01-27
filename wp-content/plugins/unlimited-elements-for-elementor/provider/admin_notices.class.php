<?php

/**
 * @package Unlimited Elements
 * @author UniteCMS http://unitecms.net
 * @copyright Copyright (c) 2016 UniteCMS
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

//no direct accees
defined ('UNLIMITED_ELEMENTS_INC') or die ('restricted aceess');

class UniteCreatorAdminNotices{
	
	const NOTICES_LIMIT = 1;
	const TYPE_ADVANCED = "advanced";
	
	private static $isInited = false;
	private static $arrNotices = array();
	
	
	/**
	 * set notice
	 */
	public function setNotice($text, $id, $expire, $params = array()){
				
		//don't let to add more then limited notices
		if(count(self::$arrNotices) >= self::NOTICES_LIMIT)
			return(false);

		if(empty($text))
			return(false);
			
		if(empty($id))
			return(false);
		
		$arrNotice = array();
		$arrNotice["text"] = $text;
		$arrNotice["id"] = $id;
		
		if(!empty($params)){
			unset($params["text"]);
			unset($params["id"]);
			unset($params["expire"]);
			
			$arrNotice = array_merge($arrNotice, $params);
		}
				
		if(isset(self::$arrNotices[$id]))
			return(false);
		
		self::$arrNotices[$id] = $arrNotice;
		
		$this->init();
	}
	
	/**
	 * get notice html
	 */
	private function getNoticeHtml($text, $id, $isDissmissable = true, $params = array()){
		
		$type = UniteFunctionsUC::getVal($params, "type");
		
		
		$class = "uc-admin-notice notice-info";
		
		if($type == self::TYPE_ADVANCED)
			$class .= " uc-notice-advanced";
		
		$classDissmissable = "is-dismissible";
		$classDissmissable = "";
		
		$htmlDissmiss = "";
		
		if($isDissmissable == true){
			
			$textDissmiss = __("Dismiss", "unlimited-elements-for-elementor");
			$textDissmissLabel = __("Dismiss unlimited elements message","unlimited-elements-for-elementor");
			
			$textDissmiss = esc_attr($textDissmiss);
			$textDissmissLabel = esc_attr($textDissmissLabel);
						
			$urlDissmiss = GlobalsUC::$current_page_url;
			
			$urlDissmiss = UniteFunctionsUC::addUrlParams($urlDissmiss, "uc_dismiss_notice=$id");
			
			$htmlDissmiss = "\n<a class=\"uc-notice-dismiss\" href=\"{$urlDissmiss}\" aria-label=\"$textDissmissLabel\">$textDissmiss</a>\n";
		}
		
		if($type == self::TYPE_ADVANCED){
			
			$buttonText = UniteFunctionsUC::getVal($params, "button_text");
			$buttonLink = UniteFunctionsUC::getVal($params, "button_link");
						
			$urlLogo = GlobalsUC::$urlPluginImages."logo-circle.svg";
			
			$htmlButton = "";
			
			if(!empty($buttonText)){
				
				$htmlButton = "<a class='button button-primary' href='{$buttonLink}' target='_blank'>{$buttonText}</a>";
			}
			
			$text = "<div class='uc-notice-advanced-wrapper'>
				<span class='uc-notice-advanced__item-logo'>
					<img class='uc-image-logo-ue' width=\"40\" src='$urlLogo'>
				</span>
				<span class='uc-notice-advanced__item-text'>".$text.$htmlButton."</span>
			</div>";
						
		}
		
		$html = "<div class=\"notice $class $classDissmissable\"><p>";
		$html .= $text."\n";
		$html .= $htmlDissmiss;
		$html .= "</p></div>";
		

		return($html);
	}
	
	
	
	/**
	 * put admin notices
	 */
	public function putAdminNotices(){
		
		if(empty(self::$arrNotices))
			return(false);
		
		foreach(self::$arrNotices as $notice){
			
			$text = UniteFunctionsUC::getVal($notice, "text");
			$id = UniteFunctionsUC::getVal($notice, "id");
			
			$isDissmissed = $this->isNoticeDissmissed($id);

			if($isDissmissed == true)
				continue;
			
			$htmlNotices = $this->getNoticeHtml($text, $id, true, $notice);			
			echo $htmlNotices;
		}
		
	}
	
	/**
	 * put styles
	 */
	public function putAdminStyles(){
		
		?>
		<!--  unlimited elements notices styles -->
		<style type="text/css">
			
			.uc-admin-notice{
				position:relative;
			}
			
			.uc-admin-notice.uc-notice-advanced{
				font-size:16px;
			}
			
			.uc-admin-notice .uc-notice-advanced-wrapper span{
				display:table-cell;
				vertical-align:middle;
			}
			
			.uc-admin-notice .uc-notice-advanced-wrapper .button{
				vertical-align:middle;
				margin-left:10px;
			}
			
			.uc-admin-notice .uc-notice-advanced__item-logo{
				padding-right:15px;
			}
			
			.uc-admin-notice .uc-notice-dismiss{
				position: absolute;
				top: 0px;
				right: 10px;
				padding: 10px 15px 10px 21px;
				font-size: 13px;
				text-decoration: none;			
			}
			
			.uc-admin-notice .uc-notice-dismiss::before{
				position: absolute;
				top: 10px;
				left: 0px;
				transition: all .1s ease-in-out;
				
				background: none;
				color: #72777c;
				content: "\f153";
				display: block;
				font: normal 16px/20px dashicons;
				speak: none;
				height: 20px;
				text-align: center;
				width: 20px;
			}
			
			.uc-admin-notice .uc-notice-dismiss:focus::before,
			.uc-admin-notice .uc-notice-dismiss:hover::before{
				color: #c00;			
			}
 			
		</style>
		<?php 
	}
	
	/**
	 * check if some notice dissmissed
	 */
	private function isNoticeDissmissed($key){

		$userID = get_current_user_id();
		if(empty($userID))
			return(false);

		$value = get_user_meta($userID, "uc_notice_dissmissed_".$key, true);

		$value = UniteFunctionsUC::strToBool($value);
		
		return($value);
	}


	/**
	* check dissmiss action
	*/
	public function checkDissmissAction(){
		
		$dissmissKey = UniteFunctionsUC::getPostGetVariable("uc_dismiss_notice","", UniteFunctionsUC::SANITIZE_KEY);
		if(empty($dissmissKey))
			return(false);
		
		$userID = get_current_user_id();
		
		if(empty($userID))
			return(false);
		
		$metaKey = "uc_notice_dissmissed_".$dissmissKey;
		
		delete_user_meta($userID, $metaKey);
		add_user_meta($userID, $metaKey, "true", true);		
	}
	

	/**
	 * init
	 */
	private function init(){
		
		if(self::$isInited == true)
			return(false);	
					
		if(GlobalsUC::$is_admin == false)
			return(false);
				
		UniteProviderFunctionsUC::addAction("admin_init", array($this, "checkDissmissAction"));
		
		UniteProviderFunctionsUC::addFilter("admin_notices", array($this, "putAdminNotices"),10,3);
		
		UniteProviderFunctionsUC::addAction("admin_print_styles", array($this, "putAdminStyles"));
		
		self::$isInited = true;
	}
	
}
