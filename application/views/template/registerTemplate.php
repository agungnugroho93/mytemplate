<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?=$this->config->item('applicationName')?$this->config->item('applicationName'):'';?></title>

        <link href="<?=base_url('resource/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('resource/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('resource/build/css/custom.min.css');?>" rel="stylesheet">
        <script src="<?=base_url('resource/jquery/dist/jquery.min.js');?>"></script>
        <link href="<?=base_url('resource/pnotify/dist/pnotify.css');?>" rel="stylesheet">
        <script src="<?=base_url('resource/pnotify/dist/pnotify.js');?>"></script>
    </head>

    <body class="login">
        <div class="login_wrapper">
            <div class="animate form login_form">
            <section class="login_content">

            <?=form_open('users/register','id="form_register"');?>
            <input type="hidden" name="post" value="post">
            <h1>Create Account</h1>
            <div class="text-right">
                <span style="color: #ea5f5f;"><?=form_error('name', '<div class="error">', '</div>');?></span>
                <?=form_input(array('name'=>'name','value'=>set_value('name'),'class'=>'form-control','placeholder'=>'Name','style'=>'margin-bottom:15px;'));?>
            </div>
            <div class="text-right">
                <span style="color: #ea5f5f;"><?=form_error('username', '<div class="error">', '</div>');?></span>
                <?=form_input(array('name'=>'username','value'=>set_value('username'),'class'=>'form-control','placeholder'=>'Username','style'=>'margin-bottom:15px;'));?>
            </div>
            <div class="text-right">
                <span style="color: #ea5f5f;"><?=form_error('email', '<div class="error">', '</div>');?></span>
                <?=form_input(array('name'=>'email','value'=>set_value('email'),'class'=>'form-control','placeholder'=>'Email','style'=>'margin-bottom:15px;'));?>
            </div>
            <div class="text-right">
                <span style="color: #ea5f5f;"><?=form_error('password', '<div class="error">', '</div>');?></span>
                <?=form_password(array('name'=>'password','class'=>'form-control','placeholder'=>'Password','style'=>'margin-bottom:15px;'));?>
            </div>
            <div class="text-right">
                <span style="color: #ea5f5f;"><?=form_error('passconf', '<div class="error">', '</div>');?></span>
                <?=form_password(array('name'=>'passconf','class'=>'form-control','placeholder'=>'Password Confirmation','style'=>'margin-bottom:15px;'));?>
            </div>

            <div>
                <button type="submit" class="btn btn-success btn-md btn-block">Register</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Already a member ?
                    <a href="<?=site_url('users/login');?>" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>

                <div>
                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
            </div>
            <?=form_close();?>

            </section>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    message();
    function message(){
      var argType = "<?=isset($_SESSION[$this->config->item('sessionPrefix')]['msgType'])?$_SESSION[$this->config->item('sessionPrefix')]['msgType']:'';?>";
      var argTitle = "<?=isset($_SESSION[$this->config->item('sessionPrefix')]['msgTitle'])?$_SESSION[$this->config->item('sessionPrefix')]['msgTitle']:'';?>";
      var argText = "<?=isset($_SESSION[$this->config->item('sessionPrefix')]['msgText'])?$_SESSION[$this->config->item('sessionPrefix')]['msgText']:'';?>";
      "<?php if(isset($_SESSION[$this->config->item('sessionPrefix')]['msgType'])){unset($_SESSION[$this->config->item('sessionPrefix')]['msgType']);}?>";
      "<?php if(isset($_SESSION[$this->config->item('sessionPrefix')]['msgTitle'])){unset($_SESSION[$this->config->item('sessionPrefix')]['msgTitle']);}?>";
      "<?php if(isset($_SESSION[$this->config->item('sessionPrefix')]['msgText'])){unset($_SESSION[$this->config->item('sessionPrefix')]['msgText']);}?>";
        if($.trim(argType)!='' && $.trim(argTitle)!='' && $.trim(argText)!='')
        {
        new PNotify({
              title: argTitle,
              text: argText,
              type: argType,
              styling: 'bootstrap3'
          });
        }
    }
});
</script>