@extends('layouts.layout')

@section('content')

    <div class="container-fluid" id="home">
        <div class="row justify-content-end">
            <div class="col-8 text-light text-center" id="content-home">
                <h1 class="text-light ">Bem vindo</h1>
                <p>Peça já sua refeição e será entrege no conforto da sua casa</p>
                <a href="{{ route('menu') }}" class="btn btn-primary">
                    <i class="material-icons">restaurant_menu</i> VEJA NOSSO MENU
                </a>
            </div>
        </div>
    </div>

    <div class="container p-3" id="informations">
        <div class="row">
            <div class="col-12 col-sm-4 p-2">
                <h4>Contato</h4>
                <i class="bi bi-telephone"></i> Telefone: (12) XXXX-XXXX
                <br><i class="bi bi-whatsapp"></i> WhatsApp: (12) XXXXX-XXXX
                <br><i class="bi bi-envelope"></i> E-mail: mail@mail.com
            </div>
            <div class="col-12 col-sm-4 p-2">
                <h4>Endereço</h4>
                <i class="material-icons">pin_drop</i> Rua Exemplo nº 000 - Centro
                <br><i class="material-icons">location_city</i> Cachoeira Paulista-SP
                <br>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29453.843191951375!2d-45.028813905996266!3d-22.663838396751206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cccac305a271ab%3A0xdba0e8e733c077d3!2sCachoeira%20Paulista%2C%20SP%2C%2012630-000!5e0!3m2!1spt-BR!2sbr!4v1621707702347!5m2!1spt-BR!2sbr"
                     style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-12 col-sm-4 p-2">
                <h4>Redes Sociais</h4>
                <i class="bi bi-facebook"></i> Facebook:
                <br><i class="bi bi-instagram"></i> Instagram:
            </div>
        </div>
    </div>




@endsection
