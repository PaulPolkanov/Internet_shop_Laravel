<form action="/mailer" method="POST">
    @csrf
    <input type="text" name="name">
    <textarea name="msg" id="" cols="30" rows="10"></textarea>
    <button type="submit"></button>
</form>