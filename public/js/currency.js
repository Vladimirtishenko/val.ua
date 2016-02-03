var currensy = (function() {

    return {
        getCurrensy: function() {
            var xhr = new XMLHttpRequest();
            url = "http://"+location.hostname+"/site/tryCurrency";

            xhr.addEventListener("readystatechange", readestateHandler);

            function readestateHandler() {
                if (this.status == 200 && this.readyState == 4) {
                    var query = JSON.parse(this.responseText);
                    templates(query);
                }
            }
            xhr.open("GET", url, true);
            xhr.send(null);

        }
    }

    function templates(query) {
        var InArray = Array("Альфа-Банк", "ПриватБанк", "ПУМБ", "Укрсоцбанк", "Райффайзен Банк Аваль");
        var a = Array(),
            stay;
        [].reduce.call(query, function(previousValue, currentValue, index) {

            if (previousValue == 0 || currentValue.bankName != previousValue) {
                if (stay) {
                    a.push(stay);
                }
                stay = {};
                stay.bankName = currentValue.bankName;
                stay[currentValue.codeAlpha] = {
                    rateBuy: currentValue.rateBuy,
                    rateBuyDelta: currentValue.rateBuyDelta,
                    rateSale: currentValue.rateSale,
                    rateSaleDelta: currentValue.rateSaleDelta
                }
            } else {
                stay[currentValue.codeAlpha] = {
                    rateBuy: currentValue.rateBuy,
                    rateBuyDelta: currentValue.rateBuyDelta,
                    rateSale: currentValue.rateSale,
                    rateSaleDelta: currentValue.rateSaleDelta
                }
            }

            return currentValue.bankName;

        }, 0);


        var newA = a.filter(function(item, i) {
            if (inArray(item.bankName, InArray)) {
                return item;
            }
        });

        templateForArray(newA);

    }


    function inArray(needle, array) {
        for (var i = 0, l = array.length; i < l; i++) {
            if (array[i] == needle) {
                return true;
            }
        }
        return false;
    }


    function templateForArray(a) {

        var str = "<table class='-new-currensy'><tr><td><span>Банк</span></td><td><span style='font-size: 18px'>&#402;</span></td><td><span>Покупка</span></td><td><span>Продажа</span></td></tr>";

        [].forEach.call(a, function(item, i) {
            str += "<tr>" + "<td><p><i>" + item.bankName + "</i></p></td>" + "<td><span><b>&euro;</b></span><span><b>$</b></span><span><b>R</b></span></td>" + "<td><span>" + gets(item, "EUR", "rateBuy") + "</span> <span>" + gets(item, "USD", "rateBuy") + "</span> <span>" + gets(item, "RUB", "rateBuy") + "</span></td>" + "<td><span>" + gets(item, "EUR", "rateSale") + "</span> <span>" + gets(item, "USD", "rateSale") + "</span> <span>" + gets(item, "RUB", "rateSale") + "</span></td>" + "</tr>"
        });

        str += "</table>";

        var div = document.querySelector(".-currency-val")
        div.insertAdjacentHTML("beforeend", str);

    }


    function gets(item, items, rate) {

        if (item[items]) {
            if (rate == "rateBuy") {
                var srt = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateBuyDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateBuyDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
                srt += delta;
                return srt;
            } else if (rate == "rateSale") {
                var srt = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateSaleDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateSaleDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
                srt += delta;
                return srt;
            }
        } else {
            return '-';
        }

    }
})();

window.addEventListener("DOMContentLoaded", function(){
  currensy.getCurrensy(); 
})
