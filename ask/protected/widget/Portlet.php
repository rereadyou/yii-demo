<?php
class portlet extends CWidget
{
    private static $idCount = 1;
    public $id;
    public $title;
    public $visible = true;
 
    public function init()
    {
        $this->id = $this->id . self::$idCount;
        self::$idCount++;
        
        if(!$this->visible) {
            return false;
        }
        return true;
    }
 
    public function run()
    {
        if ($this->visible) {
            $this->renderContent();
        }
    }
 
    protected function renderContent()
    {
        // child class should override this method
        // to render the actual body content
    }
}