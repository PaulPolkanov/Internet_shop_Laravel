<form action="/mailer" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="name">
    <textarea name="msg" id="" cols="30" rows="10"></textarea>
    <button type="submit"></button>
</form><?php /**PATH C:\xampp\server\htdocs\example-app\resources\views/pages/form.blade.php ENDPATH**/ ?>