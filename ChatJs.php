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
 * @author Andy Fitria <sintret@gmail.com>
 */
class ChatJs extends AssetBundle {

    public $sourcePath = '@vendor/sintret/yii2-chat-adminlte/assets';
    public $js = [
        'js/chat.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init() {
        parent::init();
        $this->js[] = YII_DEBUG ? 'js/chat.js' : 'js/chat.min.js';
    }

}
