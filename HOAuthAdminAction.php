<?php
/**
 * HOAuthAdminAction - administrative action. Helps to create config for HybridAuth
 * 
 * @uses CAction
 * @version 1.0
 * @copyright Copyright &copy; 2013 Sviatoslav Danylenko
 * @author Sviatoslav Danylenko <dev@udf.su> 
 * @license PGPLv3 ({@link http://www.gnu.org/licenses/gpl-3.0.html})
 */
class HOAuthAdminAction extends CAction
{
  /**
   * @var string $route id of module and controller (eg. module/controller) for wich to generate oauth urls
   */
  public $route = false;

  public function run()
  {
    $path = dirname(__FILE__);
    if(!$this->route)
      $endpoint_url = $this->controller->module ? $this->controller->module->id . '/' . $this->controller->id : $this->controller->id;
    else
      $endpoint_url = $this->route;

    $endpoint_url = Yii::app()->createAbsoluteUrl($endpoint_url . '/oauth');

    include($path.'/hybridauth/install.php');
    Yii::app()->end();
  }
}
