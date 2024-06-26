$(document).on('click', '.reveal', function () {
  var $pwd = $(this).closest('.input-group').find('.form-control');
  if ($pwd.attr('type') === 'password') {
    $pwd.attr('type', 'text');
    $(this).html('<i class="fa fa-eye-slash"></i>');
  } else {
    $pwd.attr('type', 'password');
    $(this).html('<i class="fa fa-eye"></i>');
  }
});