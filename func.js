conver(index) {
let n = Math.floor(index / 26)
let m = index % 26 === 0 ? 25 : index % 26 - 1;
let tem = '';
if (n > 0) {
  for (let i = 0; i < n; i++) {
	tem += this.letter_map[i]
  }
}
return tem += this.letter_map[m]
},

function format(number){
 let fixed=number.toFixed(2).toString();
 let reg = fixed.indexOf(".") > -1 ? /(\d)(?=(\d{3})+\.)/g : /(\d)(?=(?:\d{3})+$)/g;
 return fixed.replace(reg,"$1,");
}

parseFloat(12342).toFixed(2).replace(/(\d)(?=(\d{3})+\.\d+$)/g, '$1,')

// 将url.hash转obj
var obj = {}
var reg = /([^?=&#]+)=([^?=&#]+)/g
'agent=1234&bere=2&cc=1&cd=34'.replace(reg,($1,$2,$3)=>{obj[$2]=$3})


