function y(){const t=async o=>await axios.get(o).then(function(n){return n.data}).catch(function(n){n.message}),e=async(o,n)=>await axios.get(o+"/"+n).then(function(a){return a.data}).catch(function(a){return a.message}),i=async(o,n)=>await axios.post(o,n).then(function(a){return a.data}).catch(function(a){return a.message}),p=async(o,n,a)=>await axios.put(o+"/"+n,a).then(function(r){return r.data}).catch(function(r){return r.message}),g=async(o,n)=>await axios.delete(o+"/"+n).then(function(a){return a.data}).catch(function(a){return a.message});function w(o,n){const a=[];for(let r=0;r<n;r++){const s=`#${[o[0]+Math.floor(Math.random()*50)-25,o[1]+Math.floor(Math.random()*50)-25,o[2]+Math.floor(Math.random()*50)-25].map(c=>Math.max(0,Math.min(255,c)).toString(16).padStart(2,"0")).join("")}`;a.push(s)}return a}function M(o){const n=[];for(let a=0;a<o;a++){const r=[Math.floor(Math.random()*256),Math.floor(Math.random()*256),Math.floor(Math.random()*256)],s=`#${[r[0]+Math.floor(Math.random()*50)-25,r[1]+Math.floor(Math.random()*50)-25,r[2]+Math.floor(Math.random()*50)-25].map(c=>Math.max(0,Math.min(255,c)).toString(16).padStart(2,"0")).join("")}`;n.push(s)}return n}function x(o,n){const a=[];for(const r of o){let d=parseInt(r.slice(1,3),16),s=parseInt(r.slice(3,5),16),c=parseInt(r.slice(5),16);d=Math.max(0,d-n),s=Math.max(0,s-n),c=Math.max(0,c-n);const b=`#${d.toString(16)}${s.toString(16)}${c.toString(16)}`;a.push(b)}return a}return{index:t,show:e,store:i,update:p,destroy:g,colorPallete:w,darkerColors:x,randomColor:M}}const{index:k,show:E,store:O,update:F,destroy:K,colorPallete:W,darkerColors:v,randomColor:S}=y(),u={},C=async()=>{let t=await k("/chart");u.value=t,B()};C();const f={},T=$(window).width()>=768,P={scales:{y:{beginAtZero:!0},x:{ticks:{display:!!T,maxRotation:40,minRotation:40,autoSkip:!1},barPercentage:.8,categoryPercentage:.9}},responsive:!0,maintainAspectRatio:!1};function B(){f.labels=u.value.map(e=>e.name);const t=S(u.value.length);v(t,20),f.datasets=[{label:"Tür / Kitap Sayısı",data:u.value.map(e=>e.books_count),backgroundColor:t,borderColor:"#000",borderWidth:1}]}var D=document.getElementById("myChart");new Chart(D,{type:"bar",data:f,options:P});const{index:j,show:I,update:R}=y(),h=new URL(window.location.href),l=[];_(["byType","byStatus","byLibrary","byListType","search","perPage"]);$(".form-filter").change(function(){m(this.id,this.value)});$("#searchButton").click(function(){m("search",$("#search").val())});$(document).on("click",".orderBy",function(){m("orderBy",this.id)});$("#search").on("keydown",function(t){t.key==="Enter"&&$("#searchButton").trigger("click")});$(".clearUrl").click(function(){window.location.href=window.location.origin+window.location.pathname});$(document).on("click","#editType",function(){$(".storeType").attr("hidden",!0),$(".updateType").attr("hidden",!1),$(".updateType").attr("data-typeid",$(this).data("typeid")),A($(this).data("typeid"))});$(document).on("click",".updateType",function(){U($(this).data("typeid")),location.reload()});$(document).on("change",".draw-switch",function(){var t=$(this),e=t.attr("data-name");if(t.is(":checked"))$("#draw-list").append('<li class="list-group-item" id="li-'+this.id+'">'+e+"</li>"),l.push({id:this.id,name:e});else{let i=l.indexOf(e);$("#li-"+this.id).remove(),l.splice(i,1)}console.log(l),l.length>0?$("#getDraw").attr("disabled",!1):$("#getDraw").attr("disabled",!0)});$(document).on("click","#getDraw",function(){L().then(t=>{Object.keys(t).map(i=>{$("#span-"+i).remove(),$("#li-"+i).append('<span id="span-'+i+'" > : '+t[i]+"</span>"),console.log("#li-"+i)})})});async function A(t){const e=await I("/type",t);$("#type_name").val(e.name)}async function L(){let e=l.map(p=>p.id).join(",");return(await j("/draw?types="+e)).data}async function U(t){await R("/type",t,{name:$("#type_name").val()})}function m(t,e){t&&h.searchParams.set(t,e),window.location.href=h.toString()}function _(t){t.map(e=>{h.searchParams.get(e)&&$("#"+e).val(h.searchParams.get(e))})}
