<script>
    function CheckPayment() {
        if (document.getElementById('paymentForm2').checked) {
            document.getElementById('showNeedChange').style.display = 'block';

        } else {
            document.getElementById('showNeedChange').style.display = 'none';
            //document.getElementById('showNeedChange').setAttribute("disable", true);
            document.getElementById('showChange').style.display = 'none';
            document.getElementById('change').value = -999;

        }
    }

    function CheckChange() {
        if (document.getElementById('needChange1').checked) {
            document.getElementById('change').value = 0;
            document.getElementById('showChange').style.display = 'block';
        } else {
            document.getElementById('change').value = -999;
            document.getElementById('showChange').style.display = 'none';

        }
    }

</script>

@extends('layouts.layout')

@section('content')
    <div class="container-fluid p-4">

        <form action="{{ route('cart.sendMessage') }}" method="POST" target="_blank">
            @csrf

            <div class="card">
                <div class="card-header">
                    <h3>Finalizar Pedido</h3>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h4>Contato</h4>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-6">
                            <label for="customer">Nome</label>
                            <input type="text" class="form-control" name="customer" placeholder="Informe o seu nome"
                                required>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h4>Endereço da entrega</h4><small><strong>(Entregas só em Cachoeira Paulista)</strong></small>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-6 mt-2">
                            <label for="street">Rua</label>
                            <input type="text" class="form-control" name="street" placeholder="Informe o nome da sua rua"
                                required>
                        </div>
                        <div class="form-group col-12 col-sm-6 mt-2">
                            <label for="number">Número</label>
                            <input type="text" class="form-control" name="number" placeholder="Informe o número da sua casa"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-6 mt-2">
                            <label for="district">Bairro</label>
                            <input type="text" class="form-control" name="district"
                                placeholder="Informe o nome do seu bairro" required>
                        </div>
                        <div class="form-group col-12 col-sm-6 mt-2">
                            <label for="compliment">Complemento</label>
                            <input type="text" class="form-control" name="compliment" placeholder="Informe o complemento">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card-title">
                        <h4>Forma de pagamento</h4><small><strong>(Taxa de entrega R$2,00)</strong></small>
                    </div>

                    <input type="radio" class="btn-check" name="paymentForm" id="paymentForm1" autocomplete="off"
                        value="cartão" onclick="CheckPayment();">
                    <label class="btn btn-outline-primary" for="paymentForm1">Cartão <i
                            class="bi bi-credit-card"></i></label>

                    <input type="radio" class="btn-check" name="paymentForm" id="paymentForm2" autocomplete="off"
                        value="dinheiro" onclick="CheckPayment();" required>
                    <label class="btn btn-outline-success" for="paymentForm2">Dinheiro <i class="bi bi-cash"></i></label>

                    <div class="form-group mt-2" id="showNeedChange" style="display:none">

                        <h4>Precisa de troco?</h4>

                        <input type="radio" class="btn-check" name="needChange" id="needChange1" autocomplete="off"
                            value="sim" onclick="CheckChange();">
                        <label class="btn btn-outline-primary" for="needChange1">Sim</i></label>

                        <input type="radio" class="btn-check" name="needChange" id="needChange2" autocomplete="off"
                            value="não" onclick="CheckChange();">
                        <label class="btn btn-outline-danger" for="needChange2">Não</label>

                    </div>

                    <div class="form-group col-12 col-sm-3 mt-2" id="showChange" style="display:none">
                        <label for="change">Troco para quanto</label>
                        <input type="number" class="form-control" name="change" id="change" required>
                    </div>

                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h4>Observações</h4>
                    </div>
                    <textarea name="observations" cols="30" rows="10"
                        placeholder="Informe aqui se tem alguma observação sobre o pedido"></textarea>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">
                        ENVIAR PEDIDO <i class="bi bi-whatsapp"></i></button>
                </div>

                <input hidden name="order" value="{{ $order }}">
            </div>
        </form>

    </div>
@endsection
