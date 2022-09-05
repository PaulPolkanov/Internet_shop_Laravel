<h1>Уведомление безопасности</h1>
<img src="<?php echo e($message->embed(public_path().'/storage/img/'.$data['img'])); ?>" style="border-radius: 50%;">
<p>Вы получили это письмо, потому что в <b>ваш аккаунт</b> от админ-панели интернет магазина Pulttoff под ником 
    <b><?php echo e($data['name']); ?></b> 
    был выполнен вход <b><?php echo e($data['date']); ?></b>.
Если это произошло без Вашего ведома, срочно зайдите в админ-панел, чтобы защитить свой аккаунт.</p>
<b>С уважением,</b>
<b>Администрация Laravel!</b><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/mail/test.blade.php ENDPATH**/ ?>