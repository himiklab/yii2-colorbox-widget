<?php
/**
 * @link https://github.com/himiklab/yii2-colorbox-widget
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace himiklab\colorbox;

use Yii;
use yii\web\AssetBundle;

class ColorboxAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-colorbox';

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        parent::init();

        $this->js[] = YII_DEBUG ? 'jquery.colorbox.js' : 'jquery.colorbox-min.js';
        $this->registerLanguageAsset();
    }

    protected function registerLanguageAsset()
    {
        $language = Yii::$app->language;
        if (!file_exists(Yii::getAlias($this->sourcePath . "/i18n/jquery.colorbox-{$language}.js"))) {
            $language = substr($language, 0, 2);
            if (!file_exists(Yii::getAlias($this->sourcePath . "/i18n/jquery.colorbox-{$language}.js"))) {
                return;
            }
        }
        $this->js[] = "i18n/jquery.colorbox-{$language}.js";
    }
}
