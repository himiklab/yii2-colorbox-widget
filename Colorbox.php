<?php
/**
 * @link https://github.com/himiklab/yii2-colorbox-widget
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT
 */

namespace himiklab\colorbox;

use yii\helpers\Json;
use yii\base\Widget;

/**
 * Widget renders an Colorbox lightbox jQuery widget.
 *
 * For example:
 *
 * ```php
 * echo Colorbox::widget([
 *     'targets' => [
 *          '.colorbox' => [
 *              'maxWidth' => 800,
 *              'maxHeight' => 600,
 *          ],
 *      ]
 * ]);
 * ```
 *
 * @author HimikLab
 * @see http://www.jacklmoore.com/colorbox/
 * @package himiklab\colorbox
 */
class Colorbox extends Widget
{
    public $targets = [];

    public function init()
    {
        parent::init();
        $view = $this->getView();

        if (!empty($this->targets)) {
            $script = '';
            foreach ($this->targets as $selector => $options) {
                $options = Json::encode($options);
                $script .= "$('$selector').colorbox($options);" . PHP_EOL;
            }
            $view->registerJs($script);
        }
        ColorboxAsset::register($view);
    }
}
