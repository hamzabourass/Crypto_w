@extends('base')
@section('title','Leaderboard')
@section('content')


<br>
<center><h1 id ="pa">  Ranking Table</h1></center>
<br>

 <div class="container  ">
    <br>
    <!-- create a table here -->
    <table class="table is-narrow is-hoverable" id="leaderboard">
        <thead>
            <tr>
                <th class="rank"><abbr title="Position">Rank</abbr></th>
                <th class="name">Name</th>
                <th class="symbol">Symbol</th>
                <th class="price">Price(USD)</th>
                <th class="market_cap">Market Cap</th>
                <th class="circulating_supply">Circulating Supply</th>
                <th class="volume_24h">Volume(24h)</th>
                <th class="percent_change_24h">24h %</th>
            </tr>
        </thead>
        <tbody id="cryptocurrencies">
        </tbody>
    </table>

    <!-- load in jquery script to use jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

    <!-- main script -->
    <script>
        // fetch cryptocurrency data and store it in the variable data
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd", false);
        xhReq.send(null);
        var data = JSON.parse(xhReq.responseText);

        // initialization
        var cryptocurrencies;
        var timerId;
        var updateInterval = 1000;


        function ascending(a, b) { return a.percent_change_24h > b.percent_change_24h ? 1 : -1; }
        function descending(a, b) { return a.percent_change_24h < b.percent_change_24h ? 1 : -1; }
        function reposition() {
            var height = $("#cryptocurrencies .cryptocurrency").height();
            var y = height;
            for(var i = 0; i < cryptocurrencies.length; i++) {
                cryptocurrencies[i].$item.css("top", y + "px");
                y += height;
            }
        }
        function updateRanks(cryptocurrencies) {
            for(var i = 0; i < cryptocurrencies.length; i++) {
                cryptocurrencies[i].$item.find(".rank").text(i + 1);
            }
        }

        function fetchNewData(data,attributeName,name){
            for(var x in data){
                if((data[x].name == name) == true) {
                    return data[x][attributeName];
                }
            }
            return null;
        }
        function updateBoard() {
            var cryptocurrency = getRandomCoin();
            cryptocurrency.percent_change_24h += getRandomScoreIncrease();
            cryptocurrency.$item.find(".percent_change_24h").text(cryptocurrency.percent_change_24h);
            cryptocurrencies.sort(descending);
            updateRanks(cryptocurrencies);
            reposition();
        }

        function getNewData(){
            // get the new data for each coin and change to their new values
            var newReq = new XMLHttpRequest();
            newReq.open("GET", "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd", false);
            newReq.send(null);
            var newData = JSON.parse(newReq.responseText);

            for(var i = 0; i < cryptocurrencies.length; i++) {
                var cryptocurrency = cryptocurrencies[i];
                cryptocurrency.price = fetchNewData(newData,'current_price',cryptocurrency.name);
                cryptocurrency.$item.find(".price").text(cryptocurrency.price);
                cryptocurrency.volume_24h = fetchNewData(newData,'total_volume',cryptocurrency.name);
                cryptocurrency.$item.find(".volume_24h").text(cryptocurrency.volume_24h);
                cryptocurrency.percent_change_24h = fetchNewData(newData,'market_cap_change_percentage_24h',cryptocurrency.name);
                cryptocurrency.$item.find(".percent_change_24h").text(cryptocurrency.percent_change_24h);
            }
            cryptocurrencies.sort(descending);
            updateRanks(cryptocurrencies);
            reposition();
            console.log('Finished retrieving new data');

        }
        function getRandomScoreIncrease() {
            return getRandomBetween(50, 150);
        }
        function getRandomBetween(minimum, maximum) {
                return Math.floor(Math.random() * maximum) + minimum;
        }
        function resetBoard() {
            var $list = $("#cryptocurrencies");
            $list.find(".cryptocurrency").remove();
            if(timerId !== undefined) {
                clearInterval(timerId);
            }
            cryptocurrencies = [];
            for(let i = 0;i < 25;i++){
                cryptocurrencies.push(
                    {
                        name : data[i].name,
                        symbol: data[i].symbol,
                        price: data[i].current_price,
                        market_cap: data[i].market_cap,
                        circulating_supply: Math.round(data[i].circulating_supply),
                        volume_24h: data[i].total_volume,
                        percent_change_24h: data[i].market_cap_change_percentage_24h,
                    }
                )
            }

            for(var i = 0; i < cryptocurrencies.length; i++) {
                var $item = $(
                    "<tr class='cryptocurrency'>" +
                        "<th class='rank'>" + (i + 1) + "</th>" +
                        "<td class='name'>" + cryptocurrencies[i].name + "</td>" +
                        "<td class='symbol'>" + cryptocurrencies[i].symbol + "</td>" +
                        "<td class='price'>" + cryptocurrencies[i].price + "</td>" +
                        "<td class='market_cap'>" + cryptocurrencies[i].market_cap + "</td>" +
                        "<td class='circulating_supply'>" + cryptocurrencies[i].circulating_supply + "</td>" +
                        "<td class='volume_24h'>" + cryptocurrencies[i].volume_24h + "</td>" +
                        "<td class='percent_change_24h'>" + cryptocurrencies[i].percent_change_24h + "</td>" +
                    "</tr>"
                );

                cryptocurrencies[i].$item = $item;
                $list.append($item);
            }
            cryptocurrencies.sort(descending);
            updateRanks(cryptocurrencies);
            reposition();

            // fetch new data for the updateInterval
            timerId = setInterval("getNewData();", updateInterval);

        }
        resetBoard();
    </script>
        <style>
             .table {
            background-color:#aca8a8;
        }
        .table thead th {
            color: #ffffff;
        }
        .table tbody {
            background-color: #ffffff;
        }
            .rank{
            width: 60px;}
            #leaderboard #cryptocurrencies tr {



            -moz-transition-duration: 1s;
            -webkit-transition-duration: 1s;
            -ms-transition-duration: 1s;}
            .rank{
            width: 60px;
        }
        .name{
            width: 200px;
        }
        .symbol{
            width: 80px;
        }
        .price{
            width: 100px;
        }
        .market_cap{
            width: 150px;
        }
        .circulating_supply{
            width: 170px;
        }
        .volume_24h{
            width: 140px;
        }
        .percent_change_24h{
            width: 100px;
        }
        body {





background: #000000;

}
#pa {
        font-family: Geneva, Verdana, sans-serif;
        text-align: center;
        color: #ffffff;

      }
        </style></div>
@endsection


