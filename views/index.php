<!-- Chat box -->
<div class="box box-success">
    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Chat</h3>
        <div title="Status" data-toggle="tooltip" class="box-tools pull-right">
            <div data-toggle="btn-toggle" class="btn-group">
<!--                <button class="btn btn-default btn-sm active" type="button"><i class="fa fa-square text-green"></i></button>
                <button class="btn btn-default btn-sm" type="button"><i class="fa fa-square text-red"></i></button>-->
            </div>
        </div>
    </div>
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div id="chat-box" class="box-body chat" style="overflow: hidden; width: auto; height: 250px;">
            <!-- chat item -->
            <div class="item">
                <img class="online" alt="user image" src="<?php echo Yii::getAlias(Yii::$app->user->identity->avatar); ?>">
                <p class="message">
                    <a class="name" href="#">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        Admin
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
                <div class="attachment">
                    <h4>Attachments:</h4>
                    <p class="filename">
                        Theme-thumbnail-image.jpg
                    </p>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-sm btn-flat">Open</button>
                    </div>
                </div><!-- /.attachment -->
            </div><!-- /.item -->
            <!-- chat item -->
            <div class="item">
                <img class="offline" alt="user image" src="<?php echo Yii::getAlias(Yii::$app->user->identity->avatar); ?>">
                <p class="message">
                    <a class="name" href="#">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                        Admin
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div><!-- /.item -->
            <!-- chat item -->
            <div class="item">
                <img class="offline" alt="user image" src="<?php echo Yii::getAlias(Yii::$app->user->identity->avatar); ?>">
                <p class="message">
                    <a class="name" href="#">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                        Admin
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div><!-- /.item -->
        </div><div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 187.126px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div><!-- /.chat -->
    <div class="box-footer">
        <div class="input-group">
            <input placeholder="Type message..." class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div><!-- /.box (chat box) -->  