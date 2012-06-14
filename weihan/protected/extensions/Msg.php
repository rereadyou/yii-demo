<?php
/**
 
 */
class Msg
{
   //***************************************************************************
   // Configuration
   //***************************************************************************

   /**
    * The path to the directory where the view for getView is stored. Must not
    * have ending dot.
    *
    * @var string
    */
   protected $pathViews = 'application.views.msg';

   /**
    * The path to the directory where the layout for getView is stored. Must
    * not have ending dot.
    *
    * @var string
    */
   protected $pathLayouts = 'application.views.msg.layouts';

   //***************************************************************************
   // Private properties
   //***************************************************************************

	private $_message = '';
	private $_url = '';

   //***************************************************************************
   // Initialization
   //***************************************************************************

   /**
    * Init method for the application component mode.
    */
   public function init() {}

   /**
    * Constructor. Here the instance of PHPMailer is created.
    */
	public function __construct()
	{
		
	}
	/**
	 * 消息提示层，
	 * 1.当url为空时，在当前页面弹出消息层， 需要把app()->msg->message('提示');放在$this->render后面，
	 * 2。url非空时，执行到app()->msg->message('提示','url');程序便不会再往下执行
	 * @param unknown_type $message
	 * @param unknown_type $url	，如果非空，则跳转到相应的页面
	 * @param unknown_type $view
	 * @param unknown_type $layout
	 */
	public function message($message, $url = '', $view = 'msg', $layout = null){
		$this->_message = $message;
		$this->_url = $url;
		
		
		echo $this->getView($view, $layout);
//		exit;
	}
	
   //***************************************************************************
   // Setters and getters
   //***************************************************************************

   /**
    * Setter
    *
    * @param string $value pathLayouts
    */
   public function setPathLayouts($value)
   {
      if (!is_string($value) && !preg_match("/[a-z0-9\.]/i"))
         throw new CException(Yii::t('Msg', 'pathLayouts must be a Yii alias path'));
      $this->pathLayouts = $value;
   }

   /**
    * Getter
    *
    * @return string pathLayouts
    */
   public function getPathLayouts()
   {
      return $this->pathLayouts;
   }

   /**
    * Setter
    *
    * @param string $value pathViews
    */
   public function setPathViews($value)
   {
      if (!is_string($value) && !preg_match("/[a-z0-9\.]/i"))
         throw new CException(Yii::t('Msg', 'pathViews must be a Yii alias path'));
      $this->pathViews = $value;
   }

   /**
    * Getter
    *
    * @return string pathViews
    */
   public function getPathViews()
   {
      return $this->pathViews;
   }

   //***************************************************************************
   // Utilities
   //***************************************************************************

   /**
    * Displays an e-mail in preview mode. 
    *
    * @param string $view the class
    * @param array $vars
    * @param string $layout
    */
   public function getView($view, $vars = array(), $layout = null)
   {
      $body = Yii::app()->controller->renderPartial($this->pathViews.'.'.$view, array('message'=>$this->_message, 'url'=>$this->_url), true);
      if ($layout === null) {
         return $body;
      }
      else {
         return Yii::app()->controller->renderPartial($this->pathLayouts.'.'.$layout, array('content'=>$body), true);
      }
   }
}