$.getJSON("repeater-info.json", function( info ) {
    var tab = "";
    for (index = 0; index < info.rxlist.length; ++index) {
        var rx = info.rxlist[index];
        switch (info.rx[rx].type)
        {
        case "radio":
            tab = tab + '<tr id="'+rx+'">'+
                        '<td class="rx">'+info.rx[rx].name+'</td>'+
                        '<td class="sql"></td><td class="lvl"></td>'+
                        '<td class="bar"><div></div></td></tr>\r\n';
            break;

        case "virtual":
            tab = tab + '<tr id="'+rx+'">'+
                        '<td class="rx">'+info.rx[rx].name+'</td>'+
                        '<td class="sql"></td><td></td><td></td></tr>\r\n';
            break;
        }
    }

    $("#sigtab").replaceWith(tab);
    $("#callsign").replaceWith(info.callsign);

    var freq = info.output_freq / 1000000.0;
    var offs = (info.input_freq - info.output_freq) / 1000000.0;

    if (offs >= 0) {
        offs = '+'+offs;
    }

    $('#freq').replaceWith(' ('+freq.toFixed(3)+' MHz '+offs+')');

    var stream = info.uri.audiostream;
    if (stream) {
        $('#stream').html('<a href="'+stream+'" target="_blank">'+
            '<img src="/icons/sound1.png"></a>');
    }

    var jsonStream = new EventSource(info.uri.signalEventStream);
    jsonStream.onmessage = function (e) {
        var message = JSON.parse(e.data);

        if (message.event == 'Logic:transmit') {
            var tx = '';
            if (message.tx == 1) { tx = '<img src="/icons/ball.red.png">'; };
            $('#tx').html(tx);
        }

        if (message.event == 'Voter:sql_state') {
            for (index = 0; index < info.rxlist.length; ++index) {
                var rx = info.rxlist[index];
                var tri = 'tr#'+rx+' ';

                if (typeof message.rx[rx] == 'undefined') {
                    $(tri+'td.sql').text('undef');
                    $(tri+'td.lvl').text('');
                    $(tri+'td.bar div').width('0px');
                } else {
                    var sql = message.rx[rx].sql;
                    var lvl = message.rx[rx].lvl;
                    $(tri+'td.sql').text(sql);
                    $(tri+'td.lvl').text(lvl);
                    if (lvl < 0) { lvl = 0; }
                    if (lvl > 100) { lvl = 100; };
                    $(tri+'td.bar div').width(4*lvl+'px');
                    var color = '#808080';
                    if (sql == 'open') { color = 'yellow' };
                    if (sql == 'active') { color = 'red' };
                    $(tri+'td.bar div').css('background-color',color);
                }
            }
        }
    };
});
