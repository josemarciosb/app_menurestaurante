@inject('user', 'App\Http\Controllers\UserController')

@if ($user::openAtMoment() == 'não')
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Estamos fechados no momento!</h4>
        <p>Abrimos de Segunda à Sábado, das 10h às 14h</p>
    </div>
@endif
