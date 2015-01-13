<?php

/**
 * @link https://github.com/sintret/yii2-chat-adminlte
 * @copyright Copyright (c) 2014 Andy fitria 
 * @license MIT
 */

namespace sintret\chat;

use Yii;
use yii\web\AssetBundle;
use sintret\chat\models\Chat;

/**
 * @author Andy Fitria <sintret@gmail.com>
 */
class ChatRoom extends AssetBundle {

    public $sourcePath = '@vendor/sintret/yii2-chat-adminlte/assets';
    public $css = [
    ];
    public $js = [ // Configured conditionally (source/minified) during init()
        'js/chat.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public $models;

    public function init() {
        parent::init();
        $this->models= Chat::records();
        $this->js[] = YII_DEBUG ? 'js/chat.js' : 'js/chat.min.js';
    }

    public function run() {
        $this->render('index',[
            'models' =>  $this->models
        ]);
    }

}
