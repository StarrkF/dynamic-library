function f(){const t=async e=>await axios.get(e).then(function(n){return n.data}).catch(function(n){n.message}),o=async(e,n)=>await axios.get(e+"/"+n).then(function(a){return a.data}).catch(function(a){return a.message}),u=async(e,n)=>await axios.post(e,n).then(function(a){return a.data}).catch(function(a){return a.message}),h=async(e,n,a)=>await axios.put(e+"/"+n,a).then(function(r){return r.data}).catch(function(r){return r.message}),g=async(e,n)=>await axios.delete(e+"/"+n).then(function(a){return a.data}).catch(function(a){return a.message});function w(e,n){const a=[];for(let r=0;r<n;r++){const c=`#${[e[0]+Math.floor(Math.random()*50)-25,e[1]+Math.floor(Math.random()*50)-25,e[2]+Math.floor(Math.random()*50)-25].map(s=>Math.max(0,Math.min(255,s)).toString(16).padStart(2,"0")).join("")}`;a.push(c)}return a}function M(e){const n=[];for(let a=0;a<e;a++){const r=[Math.floor(Math.random()*256),Math.floor(Math.random()*256),Math.floor(Math.random()*256)],c=`#${[r[0]+Math.floor(Math.random()*50)-25,r[1]+Math.floor(Math.random()*50)-25,r[2]+Math.floor(Math.random()*50)-25].map(s=>Math.max(0,Math.min(255,s)).toString(16).padStart(2,"0")).join("")}`;n.push(c)}return n}function b(e,n){const a=[];for(const r of e){let i=parseInt(r.slice(1,3),16),c=parseInt(r.slice(3,5),16),s=parseInt(r.slice(5),16);i=Math.max(0,i-n),c=Math.max(0,c-n),s=Math.max(0,s-n);const x=`#${i.toString(16)}${c.toString(16)}${s.toString(16)}`;a.push(x)}return a}return{index:t,show:o,store:u,update:h,destroy:g,colorPallete:w,darkerColors:b,randomColor:M}}const{index:k,show:U,store:E,update:F,destroy:O,colorPallete:W,darkerColors:v,randomColor:S}=f(),d={},C=async()=>{let t=await k("/chart");d.value=t,_()};C();const p={},T=$(window).width()>=768,P={scales:{y:{beginAtZero:!0},x:{ticks:{display:!!T,maxRotation:40,minRotation:40,autoSkip:!1},barPercentage:.8,categoryPercentage:.9}},responsive:!0,maintainAspectRatio:!1};function _(){p.labels=d.value.map(o=>o.name);const t=S(d.value.length);v(t,20),p.datasets=[{label:"Tür / Kitap Sayısı",data:d.value.map(o=>o.books_count),backgroundColor:t,borderColor:"#000",borderWidth:1}]}var B=document.getElementById("myChart");new Chart(B,{type:"bar",data:p,options:P});const{index:D,show:I,update:R}=f(),l=new URL(window.location.href),y=[];L(["byType","byStatus","byLibrary","byListType","search","perPage"]);$(".form-filter").change(function(){m(this.id,this.value)});$("#searchButton").click(function(){m("search",$("#search").val())});$(document).on("click",".orderBy",function(){m("orderBy",this.id)});$("#search").on("keydown",function(t){t.key==="Enter"&&$("#searchButton").trigger("click")});$(".clearUrl").click(function(){window.location.href=window.location.origin+window.location.pathname});$(document).on("click","#editType",function(){$(".storeType").attr("hidden",!0),$(".updateType").attr("hidden",!1),$(".updateType").attr("data-typeid",$(this).data("typeid")),j($(this).data("typeid"))});$(document).on("click",".updateType",function(){K($(this).data("typeid")),location.reload()});$(document).on("change",".draw-select",function(){var t=this.id.replace("draw_","");y[t]=this.value});$(document).on("click","#getDraw",function(){A().then(t=>{let o="<h2>"+t.name+"</h2>",u="<h4>"+t.author+"</h4>",h="<h5>Kitap Türü: "+t.type.name+" - Konum: "+t.list_type_name+" - Durum: "+t.status_name+"</h5>";$(".card-result").attr("hidden",!1),$(".card-result .card-body").html(o+u+h),$(".draw-select").val("")})});async function j(t){const o=await I("/type",t);$("#type_name").val(o.name)}async function A(){var t=Object.assign({},y);return(await D("/draw?"+$.param(t))).data}async function K(t){await R("/type",t,{name:$("#type_name").val()})}function m(t,o){t&&l.searchParams.set(t,o),window.location.href=l.toString()}function L(t){t.map(o=>{l.searchParams.get(o)&&$("#"+o).val(l.searchParams.get(o))})}
