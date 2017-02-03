$(document).ready(function(){

var startDate = new Date('01/01/2012');
var FromEndDate = new Date();
var ToEndDate = new Date();

ToEndDate.setDate(ToEndDate.getDate()+365);

$('.from_date').datepicker({
    
    weekStart: 1,
    startDate: '01/01/2012',
    endDate: FromEndDate, 
    autoclose: true
})
    .on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to_date').datepicker('setStartDate', startDate);
    }); 
$('.to_date')
    .datepicker({
        weekStart: 1,
        startDate: startDate,
        endDate: ToEndDate,
        autoclose: true
    })
    .on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('.from_date').datepicker('setEndDate', FromEndDate);
    });

  
    $('#show').click(function(){
        var from1 = $('#from').val();
        var to1 = $('#to').val();
        if ((from != "") && (to != "")){
            $.ajax({
                url: '/admin/datas',
                method: 'POST',
                data: {from: from1,to: to1},
                success: function(result){
                    if(result['sigups'] != ''){
                        $('#sigups').html('<h3 id="sigups" style=" margin-top: 10px; margin-bottom: 10px;">'+ result['sigups']+'</h3>');
                    }else{
                         $('#sigups').html('<h3 id="sigups" style=" margin-top: 10px; margin-bottom: 10px;">'+ '0' +'</h3>');
                    }
                    if(result['payments'] != ''){
                        $('#payments').html('<h3 id="sigups" style=" margin-top: 10px; margin-bottom: 10px;">'+ result['payments']+'</h3>');
                    }else{
                        $('#payments').html('<h3 id="sigups" style=" margin-top: 10px; margin-bottom: 10px;">'+ '0'+'</h3>');
                       }
                    if(result['sumRevenues'] != ''){
                        $('#revenue').html('<h3 id="sigups" style=" margin-top: 10px; margin-bottom: 10px;">'+ result['sumRevenues']+',- €</h3>');
                    }else{
                        $('#revenue').html('<h3 id="sigups" style=" margin-top: 10px; margin-bottom: 10px;">'+ '0,- €'+'</h3>');
                       }
                }
            })
        }
    });
  
  


})
