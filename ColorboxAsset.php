<?php
/**
 * @link https://github.com/himiklab/yii2-colorbox-widget
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT
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
        $jsLangSuffix = $this->getLanguageSuffix();

        $this->js[] = YII_DEBUG ? 'jquery.colorbox.js' : 'jquery.colorbox-min.js';
        if ($jsLangSuffix !== 'en') {
            $this->js[] = "i18n/jquery.colorbox-{$jsLangSuffix}.js";
        }
    }

    protected function getLanguageSuffix()
    {
        $currentAppLanguage = Yii::$app->language;
        $langsExceptions = ['pt_BR', 'zn_CN', 'zh_TW'];

        if (strpos($currentAppLanguage, '_') === false) {
            return $currentAppLanguage;
        }

        if (in_array($currentAppLanguage, $langsExceptions)) {
            return str_replace('_', '-', $currentAppLanguage);
        } else {
            return substr($currentAppLanguage, 0, strpos($currentAppLanguage, '_'));
        }
    }
}
