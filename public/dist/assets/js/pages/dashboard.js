//    JSON.parse(data)
    // data.map((data)=>data.length)
    // return data.responseJSON

var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'Pasien',
		data: []
	}],
	colors: '#435ebe',
	xaxis: {
		categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
	},
}
$.getJSON('http://127.0.0.1:8000/author/visit-pasiens',  (data)=> {
    const totalPatients = Object.values(data[0]).map((patient)=>{
        return patient.length
    })
    optionsProfileVisit.series[0].data = totalPatients
    var chartProfileVisit = new ApexCharts(document.querySelector("#chart-kunjungan-pasien"), optionsProfileVisit);
    chartProfileVisit.render();
})
