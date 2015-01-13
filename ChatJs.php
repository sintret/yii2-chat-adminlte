<?php

/**
 * @link https://github.com/sintret/yii2-chat-adminlte
 * @copyright Copyright (c) 2014 Andy fitria 
 * @license MIT
 */

namespace sintret\chat;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class ChatJs extends AssetBundle {

    public $sourcePath = '@vendor/sintret/yii2-chat-adminlte/assets';
    public $css = [
    ];
    public $js = [ // Configured conditionally (source/minified) during init()
        'js/chat.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init() {
        parent::init();
        $this->js[] = YII_DEBUG ? 'js/chat.js' : 'js/chat.min.js';
    }

}
