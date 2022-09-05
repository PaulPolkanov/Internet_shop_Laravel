<h1>Reset password to link</h1>

<img src="<?php echo e($message->embed(public_path().'/storage/img/'.$data['img'])); ?>" style="border-radius: 50%;">

<p>Вы получили это письмо, потому что <b>ваш аккаунт</b> от админ-панели интернет магазина Pulttoff под ником 
    <b><?php echo e($data['name']); ?></b> 
    забыл пороль и хочет его изменить <b><?php echo e($data['date']); ?></b>.
Если это произошло без Вашего ведома, срочно зайдите в админ-панел, чтобы защитить свой аккаунт.</p>
<p> Или прейдите по ссылке, чтобы изменить пороль:</p>
<br>
<a href="<?php echo e(Request::root()); ?>:8000/admin/resetPassword/<?php echo e($data['token']); ?>" style="background: #09f; padding: 10px;">Reset Password</a>
<br>
<br>
<b>С уважением,</b><br>
<b>Администрация Laravel!</b><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/mail/resetMail.blade.php ENDPATH**/ ?>