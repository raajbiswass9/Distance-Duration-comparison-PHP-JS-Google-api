var Garnier_page = a_garnier;
var Loreal_page = b_loreal;
var Skin_Elements_page = c_skinElements;
var Nivea_page = d_nivea;
var Lakme_page = e_lakmeCosmetics;

var chart = c3.generate({
 bindto: '#uv-div',
 padding: {
		left: 120,
		right: 120,
		top: 0,
		bottom: 0
	},
 order: 'asc',
 data: {
		labels: true,
		x: 'Company Name',
		columns:[
					['Company Name', 'Garnier', 'Loreal', 'Skin_Elements', 'Nivea', 'Lakme'],
					['Facebook page likes', Garnier_page, Loreal_page, Skin_Elements_page, Nivea_page, Lakme_page]
				],
		type: 'bar'
	},
	axis: {
		rotated: true,
		x: {
			type: 'category',
			tick: {
					outer: false
			},
			padding: {
			  left: .6,
			  right: .6
			},
		},
		y: {
			show: false
		}
	},
	legend: {
		show: true
	},
	color: {
		pattern: ['grey']
	},
	tooltip: {
		show: true
	},
	grid:{
        focus:{
			show:false
		}
    },
	bar: {
		width: {
			ratio: .7
		},
		spacing: 6
	},

});