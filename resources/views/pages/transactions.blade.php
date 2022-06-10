@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="{{  asset('css/style.css', true) }}">
@endpush
@section('content')
<div class="step-1">
    <div class="accounts">
        <div class="account-box">
                <h2>MPS</h2>
                <div class="nums mps" >
                    <img src="{{ asset('images/image2.png', true) }}" alt="master-card">
                    <p>4100</p>
                </div>
                <div class="nums mps">
                    <img src="{{ asset('images/visa.png', true) }}" alt="visa">
                    <p>2908</p>
                </div>
                <div class="nums mps">
                    <img src="{{ asset('images/image7.png', true) }}" alt="mir">
                    <p>3839</p>
                </div>
                <div class="nums mps">
                    <img src="{{ asset('images/image10.png', true) }}" alt="xxxing">
                    <p>983</p>
                </div>
            </div>
            <div class="account-box">
                <h2>Сети</h2>
                <div class="nums net">
                    <div class="okay">
                        <img src="{{ asset('images/Vector1.png', true) }}" alt="okay">
                    </div>
                    <h3>Работает</h3>
                </div>
                <div class="nums net">
                    <div class="okay">
                        <img src="{{ asset('images/Vector1.png', true) }}" alt="okay">
                    </div>
                    <h3>Работает</h3>
                </div>
                <div class="nums net">
                    <div class="xxx">
                        <img src="{{ asset('images/Group11.png', true) }}" alt="x">
                    </div>
                    <h3 id="dnwork">Не работает</h3>
                </div>
                <div class="nums net">
                    <div class="okay">
                        <img src="{{ asset('images/Vector1.png', true) }}" alt="okay">
                    </div>
                    <h3>Работает</h3>
                </div>
            </div>
            <div class="account-box">
                <h2>Ошибки</h2>
                <div class="nums mistakes">
                    <h3 id="mis100">100</h3>
                </div>
                <div class="nums mistakes">
                    <h3 id="mis0">0</h3>
                </div>
                <div class="nums mistakes">
                    <h3 id="mis25">25</h3>
                </div>
                <div class="nums mistakes">
                    <h3 id="mis38">38</h3>
                </div>
            </div>
    </div>
    <div class="partners">
        <h2>Партнеры</h2>
        <h4>Кол-во транзакций <br>
            <span>в минуту</span></h4>
        <div class="nums mps">
            <img src="{{ asset('images/image11.png', true) }}" alt="payme">
            <p>12984</p>
        </div>
        <div class="nums mps">
            <img src="{{ asset('images/image14.png', true) }}" alt="click">
            <p>9842</p>
        </div>
        <div class="nums mps">
            <img src="{{ asset('images/paynet.png', true) }}" alt="paynet">
            <p>19024</p>
        </div>
        <div class="nums mps">
            <img src="{{ asset('images/upay.png', true) }}" alt="upay">
            <p>2211</p>
        </div>
    </div>
</div>

<div class="midle_h2">
    <h2>Скорость транзакции</h2>
</div>
<div class="today">
    <h3>Сегодня</h3>
</div>
<div class="results">
    <div class="reports">
        <div class="succes">
            <p>Успешно</p>
            <h3>1948</h3>
        </div>
    </div>
    <div class="reports">
        <div class="fail">
            <p>Отказ</p>
            <h3>94</h3>
        </div>
    </div>
    <div class="reports">
        <div class="unsucces">
            <p>Неуспешно</p>
            <h3>12</h3>
        </div>
    </div>
</div>
<div class="yesterday">
    <h3>Вчера</h3>
</div>
<div class="results">
    <div class="reports">
        <div class="succes">
            <p>Успешно</p>
            <h3>1806</h3>
        </div>
    </div>
    <div class="reports">
        <div class="fail">
            <p>Отказ</p>
            <h3>119</h3>
        </div>
    </div>
    <div class="reports">
        <div class="unsucces">
            <p>Неуспешно</p>
            <h3>24</h3>
        </div>
    </div>
</div>
<div class="statistics">
    <div class="st_text">
        <h3>СТАТИСТИКА С СРАВНЕНИЕМ</h3>
    </div>
    <div class="st_num">
        <h3>14 %</h3>
        <img src="{{ asset('images/grow.png', true) }}" alt="grow">
    </div>
</div>
@endsection
