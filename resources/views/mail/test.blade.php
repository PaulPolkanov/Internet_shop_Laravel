<h1>Уведомление безопасности</h1>
<img src="{{ $message->embed(public_path().'/storage/img/'.$data['img']) }}" style="border-radius: 50%;">
<p>Вы получили это письмо, потому что в <b>ваш аккаунт</b> от админ-панели интернет магазина Pulttoff под ником 
    <b>{{$data['name']}}</b> 
    был выполнен вход <b>{{$data['date']}}</b>.
Если это произошло без Вашего ведома, срочно зайдите в админ-панел, чтобы защитить свой аккаунт.</p>
<b>С уважением,</b>
<b>Администрация Laravel!</b>