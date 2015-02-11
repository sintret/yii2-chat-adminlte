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
    public $userModel;
    public $userField;
    public $model;

    public function init() {
        $this->model = new Chat();
        if ($this->userModel === NULL) {
            $this->userModel = Yii::$app->getUser()->identityClass;
        }

        $this->model->userModel = $this->userModel;

        if ($this->userField === NULL) {
            $this->userField = 'avatarImage';
        }
        
        $this->model->userField = $this->userField;


        parent::init();
    }

    public function run() {
        parent::init();
        ChatJs::register($this->view);
        $data = $this->data();
        return $this->render('index', [
                    'data' => $data,
                    'url' => $this->url,
                    'userModel' => $this->userModel,
                    'userField' => $this->userField,
        ]);
    }

    public static function sendChat($post) {
        $message = $post['message'];
        $userField = $post['userfield'];
        $userModel = $post['model'];
        $model = new \sintret\chat\models\Chat;
        $model->userModel = $userModel;
        $model->userField = $userField;

        if ($message) {
            $model->message = $message;
            $model->userId = Yii::$app->user->id;

            if ($model->save()) {
                echo $model->data();
            } else {
                print_r($model->getErrors());
                exit(0);
            }
        }
        echo $model->data();
    }

    public static function data() {
        $output .='';
        $models = Chat::records();
        if ($models)
            foreach ($models as $model) {
                if (isset($model->user->avatarImage)) {
                    $avatar = $model->user->avatarImage;
                } else
                    $avatar = Yii::getAlias("@vendor/sintret/yii2-chat-adminlte/assets/img/avatar.png");
                $output .= '<div class="item">
                <img class="online" alt="user image" src="' . $avatar . '">
                <p class="message">
                    <a class="name" href="#">
                        <small class="text-muted pull-right" style="color:green"><i class="fa fa-clock-o"></i> ' . \kartik\helpers\Enum::timeElapsed($model->updateDate) . '</small>
                        ' . $model->user->username . '
                    </a>
                   ' . $model->message . '
                </p>
            </div>';
            }

        return $output;
    }

}
