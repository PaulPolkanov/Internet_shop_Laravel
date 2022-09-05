<h1>Reset password to link</h1>

<img src="{{ $message->embed(public_path().'/storage/img/'.$data['img']) }}" style="border-radius: 50%;">

<p>Вы получили это письмо, потому что <b>ваш аккаунт</b> от админ-панели интернет магазина Pulttoff под ником 
    <b>{{$data['name']}}</b> 
    забыл пороль и хочет его изменить <b>{{$data['date']}}</b>.
Если это произошло без Вашего ведома, срочно зайдите в админ-панел, чтобы защитить свой аккаунт.</p>
<p> Или прейдите по ссылке, чтобы изменить пороль:</p>
<br>
<a href="{{Request::root()}}:8000/admin/resetPassword/{{$data['token']}}" style="background: #09f; padding: 10px;">Reset Password</a>
<br>
<br>
<b>С уважением,</b><br>
<b>Администрация Laravel!</b>