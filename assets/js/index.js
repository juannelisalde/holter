/**
 * Redondear número por multiplo.
 *
 * @param	{Number}	num	Número a redondear.
 * @param	{Number}	fact	Factor a calcular el número.
 * @param	{bool}	op		Aproximar hacia arriba o hacia abajo.
 * @returns	{Number}			El valor mas próximo.
 */

// 

function redondear(num, fact, op){
 var resto = num % fact, bool = (op)? (resto < fact && resto > 0) : op;
 var res = num - resto + (bool ? fact : 0);
 return res;
}

// Cálculo de logaritmo en diferentes bases
function getBaseLog(x, b) {
  return Math.log(x) / Math.log(b);
}

// Generación de número aleatorios

window.randomScalingFactor = function(obj) {
	return Math.floor(Math.random()*(obj.max-obj.min+1)+obj.min);
};

// Generación de parejas oredenadas de datos aleatorios

var genSimulate = function(conf, no){
	var arrSim = [];
	for (var i = 0; i <= no; i++) {
		arrSim.push(randomScalingFactor(conf));
	};

	// return arrSim.sort(function(a, b){return a-b});
	return arrSim;
};

var genHTMLObj = function(obj){
	var html = '<ul>';
		$.each(obj,function(i,v){
			html+='<li>Item '+(i+1)+' ('+v.x+','+v.y+')</li>'
		});
	html+='</ul>';
	$("#list_data").html(html);
};

// Generación de arreglo de datos generados

var genArr = function(arr){
	console.log(arr);
	var obj = [];
	for (var i = 0; i < (arr.length-1); i++) {
		let item =  [arr[i], arr[i+1]];
		obj.push(item);
	};
	//genHTMLObj(obj);
	return obj;
};

// Generación de objeto de datos simulados

var genObj = function(arr){
	
	var obj = [];
	for (var i = 0; i < (arr.length-1); i++) {
		let item = {x: arr[i], y:arr[i+1]};
		obj.push(item);
	};
	genHTMLObj(obj);
	return obj;
};

// Encabezados  largos

var headTxt = function(item){
	var word;
	switch(item){
		case 0: word = "Frecuencia Mínima" ; break;
		case 1: word = "Frecuencia Máxima" ; break;
		case 2: word = "Latidos por hora" ; break;
		case 3: word = "Hora de medición" ; break;
		default: word = "Indefinido" ; break;
	}
	return word;
}

// Encabezados abreviados

var exportTxt = function(item){
	var word;
	switch(item){
		case 0: word = "FMin" ; break;
		case 1: word = "FMax" ; break;
		case 2: word = "Lat/Hora" ; break;
		case 3: word = "Hora" ; break;
		default: word = "und" ; break;
	}
	return word;
}

// Tranformando numero

var parseNum =  function(str){
	var res = str.replace(",", "");
	return parseInt(res);
};

// Validar objeto

var valObjectData =  function(obj){
	var validate = true ;
	var min=0, max=0, lh = 0; 
	$.each(JSON.parse(obj), function(i,v){
		if(i == 0){
			min = parseInt(v.FMin);
			max = parseInt(v.FMax);
			lh = 0;
		}
		for (att in v) {
			var valInt = parseNum(v[att]);
			if(v[att] == "" || valInt <= 0 || typeof valInt != "number"){
				$.message("Debe Digitar La Totalidad De La Grilla"); 
				validate = false;
				return false;
			}else{
				switch(att){
					case "FMin": min = (min>=valInt)?valInt:min; break;
					case "FMax": max = (max<=valInt)?valInt:max; break;
					case "Lat/Hora": lh = lh + valInt; break;
				}

			}
		};

	});

	if(validate){
		let calc= Math.pow(max-min, 2);
		let gen = (calc+(calc*0.5) > 10000) ? 10000 : calc+(calc*0.5);
		let returnObj = {min: min, max: max, lh: lh, gen: gen};
		console.log(returnObj);
		return returnObj;
	}
}

// Calcular cantidad de cuadros
var calculaCuadros = function(min, max, fact){
	var limMin = redondear(min, fact, false);
	var limMax = redondear(max, fact, true);

	var numCuadros = Math.pow((limMax-limMin)/fact,2);
	return {limMin : limMin,limMax : limMax, numCuadros : numCuadros};
}

//Calcular operaciones del atractor
var calculaResultado = function(LimitMax, min, max){
	var maxCaudros5 = Math.pow(LimitMax/5,2);
	var maxCaudros10 = Math.pow(LimitMax/10,2);
	var cuadro5 = calculaCuadros(min, max, 5);
	var cuadro10 = calculaCuadros(min, max, 10);
	var calcLog = getBaseLog((cuadro5.numCuadros/ cuadro10.numCuadros), 2);
	var prob5 = cuadro5.numCuadros/maxCaudros5;
	var prob10 = cuadro10.numCuadros/maxCaudros10;

	console.log(cuadro5);
	console.log(cuadro10);

	return {calcLog : calcLog, prob5 : prob5, prob10 : prob10};
}

//Carga de gráfica
chartHolter = function(Conf) {

	
	var chart = Highcharts.chart('char-holter', {
	    title: {
	        text: 'Simulación Holter'
	    },
	    subtitle: {
	        text: 'Simulación entre rango de '+Conf.min+' a '+Conf.max+' latidos por min'
	    },
	    xAxis: {
	    	min: 0,
	    	max: Conf.max,
	        gridLineWidth: 1,
	        tickInterval: Conf.step,
	        title: {
	            enabled: true,
	            text: 'Lat/Min'
	        },
	        startOnTick: true,
	        endOnTick: true,
	        showLastLabel: true
	    },
	    yAxis: {
	    	min: 0,
	    	max: Conf.max,
	        gridLineWidth: 1,
	        tickInterval: Conf.step,
	        title: {
	            text: 'Lat/Min'
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'middle'
	    },
	    series: [{
	        name: 'Toma de muestra',
	        type: 'polygon',
	        data: [],
	        color: 'rgba(255, 206, 84, 0.7)',
	        enableMouseTracking: true

	    }/*,{
	        name: 'Frecuencia cardiaca',
	        type: 'scatter',
	        color: Highcharts.getOptions().colors[1],
	        data: [],
	        enableMouseTracking: true

	    }, {
	        name: 'Segunda Toma',
	        type: 'polygon',
	        color: 'rgba(160, 212, 104, 0.7)',
	        data: [],
	        enableMouseTracking: true

	    },
	    {
	        name: 'Tercera Toma',
	        type: 'polygon',
	        color: 'rgba(124, 181, 236, 0.7)',
	        data: [],
	        enableMouseTracking: true

	    }*/
	    ],
            plotOptions:{
                series:{
                    turboThreshold:10000//larger threshold or set to 0 to disable
                }
            },
	    responsive: {
	        rules: [{
	            condition: {
	                minHeigth: 1000,
	                minWidth: 1000
	            }
	        }]
        },
	    tooltip: {
	        headerFormat: '<b>{series.name}</b><br>',
	        pointFormat: '({point.x}, {point.y})'
	    }
	});
	
	var chart2 = Highcharts.chart('char-holter-10', {
	    title: {
	        text: 'Simulación Holter'
	    },
	    subtitle: {
	        text: 'Simulación entre rango de '+Conf.min+' a '+Conf.max+' latidos por min'
	    },
	    xAxis: {
	    	min: 0,
	    	max: Conf.max,
	        gridLineWidth: 1,
	        tickInterval: Conf.step2,
	        title: {
	            enabled: true,
	            text: 'Lat/Min'
	        },
	        startOnTick: true,
	        endOnTick: true,
	        showLastLabel: true
	    },
	    yAxis: {
	    	min: 0,
	    	max: Conf.max,
	        gridLineWidth: 1,
	        tickInterval: Conf.step,
	        title: {
	            text: 'Lat/Min'
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'middle'
	    },
	    series: [{
	        name: 'Toma de muestra',
	        type: 'polygon',
	        data: [],
	        color: 'rgba(255, 206, 84, 0.7)',
	        enableMouseTracking: true

	    },{
	        name: 'Frecuencia cardiaca',
	        type: 'scatter',
	        color: Highcharts.getOptions().colors[1],
	        data: [],
	        enableMouseTracking: true

	    }
	    /*, {
	        name: 'Segunda Toma',
	        type: 'polygon',
	        color: 'rgba(160, 212, 104, 0.7)',
	        data: [],
	        enableMouseTracking: true

	    },
	    {
	        name: 'Tercera Toma',
	        type: 'polygon',
	        color: 'rgba(124, 181, 236, 0.7)',
	        data: [],
	        enableMouseTracking: true

	    }*/

	    ],
            plotOptions:{
                series:{
                    turboThreshold:10000//larger threshold or set to 0 to disable
                }
            },
	    responsive: {
	        rules: [{
	            condition: {
	                minHeigth: 1000,
	                minWidth: 1000
	            }
	        }]
        },
	    tooltip: {
	        headerFormat: '<b>{series.name}</b><br>',
	        pointFormat: '({point.x}, {point.y})'
	    }
	});

	$('#simdata').on('submit', function(e) {
		e.preventDefault();
		var dataSim = {max: parseInt($("#fre_max").val()), min: parseInt($("#fre_min").val()), no : Conf.no};
		var dataSim2 = {max: parseInt($("#fre_max").val())+10, min: parseInt($("#fre_min").val())+15, no : Conf.no};
		console.log(dataSim);

		var gendata = genObj(genSimulate(dataSim, dataSim.no));

		chart.series[0].setData(gendata);
		chart.series[1].setData(genObj(genSimulate(dataSim2, dataSim2.no)));

		var gendata2 = genObj(genSimulate(dataSim, dataSim.no));
		chart2.series[0].setData(gendata);
		chart2.series[1].setData(genObj(genSimulate(dataSim2, dataSim2.no)));


	});

	 $("#csvJson").click(function () {
      	  var jsonVal = $("#jqxgrid").jqxGrid('exportdata', 'json');
	      var validate = valObjectData(jsonVal);
	      if(validate){
	      	$("#frecuencia_min").val(validate.min);
	      	$("#frecuencia_max").val(validate.max);
	      	
	      	var dataSim = {max: validate.max, min: validate.min, no : validate.gen};
	      	var gendata = genObj(genSimulate(dataSim, dataSim.no));
	      	chart.series[0].setData(gendata);
	      	chart2.series[0].setData(gendata);
	      	var result = calculaResultado(Conf.max, validate.min, validate.max);
	      	$("#diagnostic-body").html('\
	      			<h4><i class="glyphicon glyphicon-bookmark"></i> Resultados</h4>\
				    <ul class="list-group">\
					  <li class="list-group-item"><span class="badge">'+result.calcLog+'</span> Cálculo</li>\
					  <li class="list-group-item"><span class="badge">'+result.prob5+'</span> Probabilidad</li>\
					  <li class="list-group-item">Diagnostico final: <span class="label label-default">'+result.calcLog+'</span></li>\
					</ul>');
	      	$(".msj-diag").genModal("info","<b>Información</b> Guarda el diagnóstico del paciente para llevar un historial de medición");
	      	$(".alert-content.principal").genModal("info", 'Diagnóstico sugerido: <b>Mensaje de prueba '+result.calcLog+'</b> <button type="button" class="btn btn-info" data-toggle="modal" data-target=".modal-result"><i class="glyphicon glyphicon-info-sign"></i> Ver detalle</button>');
	      	$(".modal-result").modal("show");
	      }
	      
	  });


};

