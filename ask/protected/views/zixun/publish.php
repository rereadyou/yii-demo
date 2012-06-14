<?php cs()->registerCssFile(resBu('/css/public.css', 'screen'));?>
<!--pagebody-->
<div id="pagebody" class="cwidth borderblue2 margin_top_10">
    <div class="lt"></div>
    <div class="rt"></div>
    <div class="stepimg"></div>
    <div class="alttext"><img src="/images/t.gif" width="14" height="13" />&nbsp;不用注册就可提问！由系统帮您自动分配用户名和密码！&nbsp;</div>
    <?php $form=$this->beginWidget('CActiveForm'); ?>
    <?php echo $form->errorSummary($model); ?>
    <div class="line">
        <div class="title f_l">问题标题：</div>
        <div class="inp f_l">
            <div class="messagebox titletips" style="display:none">
                <div class="co"></div>
                <p class="tith">如何写标题？<font color="red">（请输入2-30个字）</font></p>
                <p class="tith2">完整的标题让律师在3秒种内关注到您的提问</p>
                <p class="tith3">如：孩子1岁了，如果离婚可以判给男方吗？</p>
                <p class="tith3">再如：昨天我被摩托车撞伤，腿部骨折，可以得到多少赔偿？</p>
            </div>
            <?php echo $form->textField($model,'title',array('class'=>'input_1', 'value'=>$model->title)); ?>
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="line">
        <div class="title f_l">问题内容：</div>
        <div class="inp f_l">
            <div class="messagebox contenttips"  style="display:none">
                <div class="co"></div>
                <p class="tith">如何写内容？<font color="red">（请输入6个字以上）</font></p>
                <p class="tith2">完善的内容可以让您得到更有针对性的回复</p>
                <p class="tith3">如：请写明事情发生的时间、地点、人物、过程、需要解决的问题及希望达到的目的等内容。</p>
                <p class="tith3">提示：此部分内容公开，请不要提及姓名、电话，以免泄露隐私。</p>
            </div>
            <?php echo $form->textArea($model,'content',array('class'=>'input_2','cols'=>'','rows'=>10, 'value'=>$model->content)); ?>
        </div>
        <div style="clear:both"></div>
    </div>
    <script>
        $(function(){
            $('#OaskQuestion_title').focus(function(){$('.titletips').show()});
            $('#OaskQuestion_title').blur(function(){$('.titletips').hide()});

            $('#OaskQuestion_content').focus(function(){$('.contenttips').show()});
            $('#OaskQuestion_content').blur(function(){$('.contenttips').hide()});
            
            $('#OaskQuestion_area').mouseover(function(){$('.areatips').show()});
            $('#OaskQuestion_area').mouseout(function(){$('.areatips').hide()});
        });
    </script>

    <div class="line">
        <div class="title f_l">选择地区：</div>
        <div class="inp2 f_l" id="OaskQuestion_area">

            <div class="messagebox areatips" style="display:none">
                <div class="co"></div>
                <p class="tith">选择地区</p>
                <p class="tith2">地区为自动匹配，细化到县级市 级别</p>
                <p class="tith3">如山东 济南 章丘市，可重新选择问题发生地区</p>
            </div>
            <?php
            $cnameids=86;
            if (isset ($_COOKIE['cnameid'])) {
                $cnameids=$_COOKIE['cnameid'];
            }
            $this->widget('ModuleArea',array('cnameid'=>$cnameids));
            ?>
        </div>
    </div>
    <div class="line">
        <div class="title f_l">选择分类：</div>
        <div class="inp2 f_l">
<?php $this->widget('category');?>
        </div>
    </div>
    <div class="dot"></div>
    <div style="font-size:12px; margin-left:50px; margin-top:10px; margin-bottom:20px;"><img src="/images/t.gif" width="14" height="13" /> <span style="font-size:12px; color:#FF6600; font-weight:bold;">温馨提示</span>:以下3种联系方式均属于选填项，为了更好的为您解答，建议您至少选择一种联系方式</div>
    <div class="line">
        <div class="title f_l">邮箱：</div>
        <div class="inp f_l">
            <input name="email" type="text" class="input_4" value="<?php if(!app()->user->isguest) echo UserTool::user()->email . '" readonly="readonly"'; ?>"/><br>请留下您的邮箱，便于律师24小时与你联系
        </div>
    </div>
    <div class="line">
        <div class="title f_l">联系电话：</div>
        <div class="inp f_l">
            <input name="phone" type="text" class="input_4" value="<?php if(!app()->user->isguest) echo UserTool::user()->mobile . '" readonly="readonly"'; ?>" />
            <span style="color:#333;"><img src="/images/tups_.gif" />不公开</span>
            <br>请填写真实联系方式，便于客服人员免费为您推荐当地律师。
        </div>
    </div>
        <div class="line">
        <div class="title f_l">QQ：</div>
        <div class="inp f_l">
            <input name="qq" type="text" class="input_4" value="<?php if(!app()->user->isguest) echo UserTool::user()->QQ . '" readonly="readonly"'; ?>" />
               <br>请填写真实联系方式，便于客服人员免费为您推荐当地律师。
        </div>
    </div>
    <div class="line">
        <div class="title f_l">悬赏分：</div>
        <div class="inp f_l">
<?php 
            echo CHtml::dropDownList('OaskQuestion[shang]', 5, array('5'=>5,'10'=>10),array('class'=>"ft12 selwidth"))
            ?>
            悬赏分，系统默认是五分
        </div>
    </div>
<?php 
    if(app()->user->isguest) {
        ?>
    <div class="line">
        <div class="title f_l">验 证码：</div>
        <div class="inp f_l">
    <?php echo $form->textField($model,'verifyCode',array('class'=>'input_3')); ?>
                <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('class'=>'xjihet' ))); ?>
        </div>

    </div>
    <?php }?>
    <div class="line">
        <div class="title f_l">&nbsp;</div>
        <div class="inp f_l">
<?php echo CHtml::imageButton('/images/submit.gif',array('width'=>'378','height'=>'55'));?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div>
<!--pagefooter-->