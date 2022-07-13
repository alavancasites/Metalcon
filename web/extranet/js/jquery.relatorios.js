var datafinal = dataHoje();
var datainicial = subtrairDias(new Date(), 30).toLocaleDateString();
var sistema = 'TODOS';
$(document).ready(function () {
    $("#data-inicial").val(datainicial);
    $("#data-final").val(datafinal);
});
$(document).ready(function () {
    $('#gerar-relatorio').click(function () {
        if ($('#sistema').val() !== 'TODOS') {
            $('.principal').removeClass('visivel');
            $('.principal').addClass('bloqueado');
        } else {
            $('.principal').removeClass('bloqueado');
            $('.principal').addClass('visivel');
        }
        $('body').plainOverlay('show');
        $.ajax({
            url: 'site/faturamentoporsistema',
            type: 'GET',
            data: 'data-inicial=' + $('#data-inicial').val() + '&data-final=' + $('#data-final').val() + '&sistema=' + $('#sistema').val(),
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'}
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.ColumnChart(document.querySelector('#chart-sistema'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-sistema').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $.ajax({
            url: 'site/faturamentoticketmedio',
            type: 'GET',
            data: 'data-inicial=' + $('#data-inicial').val() + '&data-final=' + $('#data-final').val() + '&sistema=' + $('#sistema').val(),
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.ColumnChart(document.querySelector('#chart-ticket'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-ticket').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $.ajax({
            url: 'site/pedidoporsistema',
            type: 'GET',
            data: 'data-inicial=' + $('#data-inicial').val() + '&data-final=' + $('#data-final').val() + '&sistema=' + $('#sistema').val(),
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.ColumnChart(document.querySelector('#chart-periodos'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-periodos').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });

        $.ajax({
            url: 'site/pedidoporsistemaandstatus',
            type: 'GET',
            data: 'data-inicial=' + $('#data-inicial').val() + '&data-final=' + $('#data-final').val() + '&sistema=' + $('#sistema').val(),
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 400,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                    
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.BarChart(document.querySelector('#chart-pedidos-sistema'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-pedidos-sistema').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });

        $.ajax({
            url: 'site/relatoriosontop',
            type: 'GET',
            data: 'data-inicial=' + $('#data-inicial').val() + '&data-final=' + $('#data-final').val() + '&sistema=' + $('#sistema').val(),
            dataType: 'json',
            success: function (json) {
                $('#numero-de-pedidos').html(json.qtdpedidos);
                $('#ticket-medio').html(json.ticketmedio);
                $('#faturamento').html(json.valortotal);
            },
            error: function () {
                $('#numero-de-pedidos').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
                $('#ticket-medio').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
                $('#faturamento').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $('body').plainOverlay('hide');
        return false;
    }),
    $(window).load(function () {
        $('body').plainOverlay('show');
        $.ajax({
            url: 'site/faturamentoporsistema',
            type: 'GET',
            data: 'data-inicial=' + datainicial + '&data-final=' + datafinal + '&sistema=' + sistema,
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.ColumnChart(document.querySelector('#chart-sistema'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-sistema').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $.ajax({
            url: 'site/faturamentoticketmedio',
            type: 'GET',
            data: 'data-inicial=' + datainicial + '&data-final=' + datafinal + '&sistema=' + sistema,
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.ColumnChart(document.querySelector('#chart-ticket'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-ticket').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $.ajax({
            url: 'site/pedidoporsistema',
            type: 'GET',
            data: 'data-inicial=' + datainicial + '&data-final=' + datafinal + '&sistema=' + sistema,
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.ColumnChart(document.querySelector('#chart-periodos'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-periodos').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $.ajax({
            url: 'site/pedidoporsistemaandstatus',
            type: 'GET',
            data: 'data-inicial=' + datainicial + '&data-final=' + datafinal + '&sistema=' + sistema,
            dataType: 'json',
            success: function (dados) {
                var options = {
                    width: 380,
                    height: 380,
                    backgroundColor: {fill: 'transparent'},
                    legend: {position: 'none'},
                    
                };
                var data = new google.visualization.arrayToDataTable(dados);
                var chart = new google.visualization.BarChart(document.querySelector('#chart-pedidos-sistema'));
                chart.draw(data, options);
                google.load('visualization', '1.0', {'packages': ['corechart'], callback: drawStuff});
            },
            error: function () {
                $('#chart-pedidos-sistema').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $.ajax({
            url: 'site/relatoriosontop',
            type: 'GET',
            data: 'data-inicial=' + datainicial + '&data-final=' + datafinal + '&sistema=' + sistema,
            dataType: 'json',
            success: function (json) {
                $('#numero-de-pedidos').html(json.qtdpedidos);
                $('#ticket-medio').html(json.ticketmedio);
                $('#faturamento').html(json.valortotal);
            },
            error: function () {
                $('#numero-de-pedidos').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
                $('#ticket-medio').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
                $('#faturamento').html('<div class="alert alert-info mensagem-style mensagem-text msg-errors" style="font-size:13px;">Nenhum dado Localizado</div>');
            }
        });
        $('body').plainOverlay('hide');
        return false;
    });
});
function dataHoje() {
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var day = currentTime.getDate();
    var year = currentTime.getFullYear();


    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }

    return day + "/" + month + "/" + year;

}
function subtrairDias(data, dias) {
    return new Date(data.getTime() - (dias * 24 * 60 * 60 * 1000));
}