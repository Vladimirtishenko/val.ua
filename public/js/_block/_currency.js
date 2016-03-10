function Currency() {
    "use strict";

    var url = "http://"+location.hostname+"/site/tryCurrency";

    this.Xhr('GET', url, null, this, this.templates);
}

Currency.prototype = Object.create(Site.prototype);

Currency.prototype.templates = function(query, self) {

    "use strict";
    var querys = JSON.parse(query),
        InArray = ["Альфа-Банк", "ПриватБанк", "ПУМБ", "Укрсоцбанк", "Райффайзен Банк Аваль"],
        a = [],
        stay;

    [].reduce.call(querys, function(previousValue, currentValue, index) {

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
            };
        } else {
            stay[currentValue.codeAlpha] = {
                rateBuy: currentValue.rateBuy,
                rateBuyDelta: currentValue.rateBuyDelta,
                rateSale: currentValue.rateSale,
                rateSaleDelta: currentValue.rateSaleDelta
            };
        }

        return currentValue.bankName;

    }, 0);


    var newA = a.filter(function(item, i) {
        if (self.inArray(item.bankName, InArray)) {
            return item;
        }
    });

    self.templateForArray(newA, self);

};

Currency.prototype.templateForArray = function(a, self) {
    "use strict";
    var str = "<table class='-new-currensy'><tr><th><span>Банк</span></th><th><span style='font-size: 18px'>&#402;</span></th><th><span>Покупка</span></th><th><span>Продажа</span></th></tr>";

    [].forEach.call(a, function(item, i) {
        str += "<tr>" + "<td><p><i>" + item.bankName + "</i></p></td>" + "<td><span><b>&euro;</b></span><span><b>$</b></span><span><b>R</b></span></td>" + "<td><span>" + self.gets(item, "EUR", "rateBuy") + "</span> <span>" + self.gets(item, "USD", "rateBuy") + "</span> <span>" + self.gets(item, "RUB", "rateBuy") + "</span></td>" + "<td><span>" + self.gets(item, "EUR", "rateSale") + "</span> <span>" + self.gets(item, "USD", "rateSale") + "</span> <span>" + self.gets(item, "RUB", "rateSale") + "</span></td>" + "</tr>";
    });

    str += "</table>";

    var div = document.querySelector(".-currency-val");
    div.insertAdjacentHTML("beforeend", str);

};


Currency.prototype.gets = function(item, items, rate) {
    "use strict";
    var delta, str;
    if (item[items]) {
        if (rate == "rateBuy") {
                srt = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateBuyDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateBuyDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            srt += delta;
            return srt;
        } else if (rate == "rateSale") {
                srt = "<mark>" + Number(item[items][rate]).toFixed(2) + "</mark>";
                delta = (item[items]["rateSaleDelta"] > 0) ? "<i class='-to-hight'> &nbsp; &#9650;</i>" : (item[items]["rateSaleDelta"] < 0) ? "<i class='-to-low'> &nbsp; &#9660;</i>" : "";
            srt += delta;
            return srt;
        }
    } else {
        return '-';
    }

};