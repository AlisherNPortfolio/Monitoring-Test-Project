@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/styylee.css', true) }}">
<link rel="stylesheet" href="{{ asset('css/pagination.min.css', true) }}">
@endpush
@section('content')
<div class="step-1">
    <div class="accounts">
        <div class="mps">
            <h2>MPS Network Status</h2>
            <div id="mps-container"></div>
        </div>
        <div class="networks mps">
            <h2>MPS Сети</h2>
            <div id="mps-status"></div>
        </div>
        <div class="mistakes">
            <h2>Network Timeouts</h2>
            <div id="mps-timeouts"></div>
        </div>
        <div class="pagination-container">
            <ul id="net_status_paging" class="pagination"></ul>
        </div>
    </div>
</div>

<div class="step-2">
    <div class="partners">
        <h2>sw_quais</h2>
        <h4>(очередь в бинары)</h4>
        <div class="partners-num">
            <h2>stdauth</h2>
            <p>0</p>
        </div>
        <div class="partners-num">
            <h2>nwint</h2>
            <p>120</p>
        </div>
        <div class="partners-num">
            <img src="" alt="">
            <p></p>
        </div>
        <div class="partners-num">
            <img src="" alt="">
            <p></p>
        </div>
    </div>
</div>
@endsection
@push('end_scripts')
<script src="{{ asset('js/jquery.min.js', true) }}"></script>
<script src="{{ asset('js/pagination.min.js', true) }}"></script>
<script>
(function () {
    const URL = "{{ env('APP_URL') }}/get-network-data";
    const colors = {
        RED: '#F23D5B',
        YELLOW: 'yellow',
        GREY: 'darkgrey'
    };
    let networkData = [];
    function sendReuqestEveryMinute() {
        pagination();
        setInterval(() => {
            pagination();
        }, 60000);
    }

    function pagination() {
        $('#net_status_paging').pagination({
        total: 0,
        current: 1,
        length: 10,
        size: 2,
        ajax: function(options, refresh, $target){
            $.ajax({
                url: URL + '?page=' + options.current,
                dataType: 'json'
            }).done(function(res) {
                renderNetworkItems(res.data.data);
                refresh({
                    total: res.data.total,
                    length: res.data.per_page
                });
            }).fail(function(error) {

            });
        }
    });
    }

    function renderNetworkItems(data) {
        if (!Array.isArray(data)) {
            return;
        }

        let networkResult = '', statusResult = '', timeoutsResult = '', result;

        data.forEach(element => {
            result = generateNetworkItem(element);
            networkResult += result.network;
            statusResult += result.networkStatus;
            timeoutsResult += result.networkTimeouts;
        });

        insertIntoDOM('mps-container', networkResult);
        insertIntoDOM('mps-status', statusResult);
        insertIntoDOM('mps-timeouts', timeoutsResult);
    }

    function insertIntoDOM(element, content) {
        let domElement = document.getElementById(element);

        if (content === '' && domElement) {
            domElement.innerHTML = '<div class="partners-num"><h3 style="margin: 0 auto; color: #fff;">Нет данных</h3></div>';
        }

        if (domElement && content !== '') {
            domElement.innerHTML = '';
            domElement.innerHTML = content;
        }
    }

    function generateNetworkItem(item) {
        let strTag = {
            network: '',
            networkStatus: '',
            networkTimeouts: ''
        }

        strTag.network =  `<div class="partners-num">`;
            strTag.network += `<img src="/images/network/${getItemImageName(item.mps)}.png" alt="${item.mps}">`;
            strTag.network += `<p>${item.network}</p>`;
            strTag.network += `</div>`;

        strTag.networkStatus = `<div class="net-res">`;

        if (!item.line_status && item.logic_status) {
            strTag.networkStatus += `<div class="okay">
                                        <img src="/images/tick.png" alt="okay">
                                    </div>
                                    <h3>Работает</h3>`;
        } else {
            strTag.networkStatus += `<div class="xxx">
                                        <img src="/images/cross.png" alt="x">
                                    </div>
                                    <h3 class="dnwork">Не работает</h3>`;
        }
        strTag.networkStatus += `</div>`;
        // let percent =

        let color = item.timeouts >= 25 ? colors.YELLOW : (item.timeouts >= 50 ? colors.RED : colors.GREY);
        strTag.networkTimeouts = `<div class="mis-num">
                                    <h3 style="color:${color}">${item.timeouts}</h3>
                                </div>`;

        return strTag;
    }

    function getItemImageName(item_name) {
        item_name = item_name.split('_')[0]
        return item_name.trim().toLowerCase();
    }

    sendReuqestEveryMinute();
})();
</script>
@endpush
