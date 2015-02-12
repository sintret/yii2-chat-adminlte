# yii2-chat-adminlte
yii2 chat widget widget admin lte

add via composer :
<p>"sintret/yii2-chat-adminlte": "dev-master"</p>

You just add table chat to your database with this :

<pre>CREATE TABLE `chat` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `userId` INT(11) DEFAULT NULL,
  `message` TEXT,
  `updateDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=INNODB;
</pre>
<p>
and calling the widget in the view :
<pre>
    <section class="col-lg-9 connectedSortable ui-sortable">                                    
        <?php echo \sintret\chat\ChatRoom::widget([
            'url' => \yii\helpers\Url::to(['/chat/send-chat']),
            'userModel'=>  \app\models\User::className(),
            'userField' => 'avatarImage'
                ]); ?>
    </section>
</pre>
</p>

<p>in your controller eg ChatController action sendChat</p>

<pre>
public function actionSendChat() {
    if (!empty($_POST)) {
        echo \sintret\chat\ChatRoom::sendChat($_POST);
    }
}
</pre>
attribute additional for this widget: <p>
url : your controller/action to post message using ajax <p>
userModel : your user model class name <p>
userField : your avatar image source in your User class, ex: avatarImage

