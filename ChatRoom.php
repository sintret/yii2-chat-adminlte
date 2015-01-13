<?php

/**
 * @link https://github.com/sintret/yii2-chat-adminlte
 * @copyright Copyright (c) 2014 Andy fitria 
 * @license MIT
 */

namespace sintret\chat;

use Yii;
use yii\base\Widget;
use sintret\chat\models\Chat;

/**
 * @author Andy Fitria <sintret@gmail.com>
 */
class ChatRoom extends Widget {

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
    public $url;

    public function init() {
        parent::init();
    }

    public function run() {
        parent::init();
        ChatJs::register($this->view);
        $view = $this->getView();
        $output = '';
        $output .='<div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">Chat</h3>
            </div><hr>';
        $output .='<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div id="chat-box" class="box-body chat" style="overflow: hidden; width: auto; height: 250px;">';
        $output .='<div id="chat-data">';
        $output .= self::data();
        $output .='</div>';
        
        $output.='</div><div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 187.126px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div><!-- /.chat -->
                        <div class="box-footer">
                            <div class="input-group">
                                <input name="Chat[message]" id="chat_message" placeholder="Type message..." class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-success btn-send-comment" data-url="'.Yii::$app->urlManager->createUrl('chat/send-chat').'"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                 </div><!-- /.box (chat box) -->  ';
        return $output;
        
    }
    
    public static function data(){
        $output .='';
        $models = Chat::records();
        if($models)
            foreach ($models as $model){
                $output .= '<div class="item">
                <img class="online" alt="user image" src="'.Yii::getAlias($model->user->avatar).'">
                <p class="message">
                    <a class="name" href="#">
                        <small class="text-muted pull-right" style="color:green"><i class="fa fa-clock-o"></i> '.\kartik\helpers\Enum::timeElapsed($model->updateDate).'</small>
                        '.$model->user->username.'
                    </a>
                   '.$model->message.'
                </p>
            </div>';
            }
        
        return $output;
    }

}
