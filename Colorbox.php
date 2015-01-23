<?php
/**
 * @link https://github.com/himiklab/yii2-colorbox-widget
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace himiklab\colorbox;

use yii\base\Widget;
use yii\helpers\Json;

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
 *      ],
 *      'coreStyle' => 2
 * ]);
 * ```
 *
 * @author HimikLab
 * @see http://www.jacklmoore.com/colorbox/
 * @package himiklab\colorbox
 */
class Colorbox extends Widget
{
    /** @var array $targets */
    public $targets = [];

    /**
     * @var integer|boolean $coreStyle A number from 1 to 5 connects style from the appropriate `example` folders.
     * Set it to `false`, if you don't need to connect the built-in styles.
     */
    public $coreStyle = 1;

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

        $bundle = ColorboxAsset::register($view);
        if ($this->coreStyle !== false) {
            $view->registerCssFile("{$bundle->baseUrl}/example{$this->coreStyle}/colorbox.css");
        }
    }
}
