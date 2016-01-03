<?php

namespace app\assets;

use yii\web\AssetBundle;

class LightBoxAsset  extends AssetBundle
{
    public $sourcePath = '@drmonty/ekko-lightbox';
    public $baseUrl = '@web';
    public $css = [
        'css/ekko-lightbox.css',
    ];
    public $js = [
        'js/ekko-lightbox.js'
    ];
}
