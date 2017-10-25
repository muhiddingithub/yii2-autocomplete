<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace muhiddin\autocomplete;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AutoCompleteAsset extends AssetBundle
{
    public $sourcePath = '@muhiddin/autocomplete/web';
    public $css = [
        'css/autocomplete.css'
    ];
    public $js = [
        'js/jquery.autocomplete.js'
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

}
