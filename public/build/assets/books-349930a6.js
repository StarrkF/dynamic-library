function p(){const o=async n=>await axios.get(n).then(function(a){return a.data}).catch(function(a){a.message}),r=async(n,a)=>await axios.get(n+"/"+a).then(function(t){return t.data}).catch(function(t){return t.message}),f=async(n,a)=>await axios.post(n,a).then(function(t){return t.data}).catch(function(t){return t.message}),m=async(n,a,t)=>(console.log(t),await axios.put(n+"/"+a,t).then(function(e){return e.data}).catch(function(e){return e.message})),y=async(n,a)=>await axios.delete(n+"/"+a).then(function(t){return t.data}).catch(function(t){return t.message});function g(n,a){const t=[];for(let e=0;e<a;e++){const c=`#${[n[0]+Math.floor(Math.random()*50)-25,n[1]+Math.floor(Math.random()*50)-25,n[2]+Math.floor(Math.random()*50)-25].map(s=>Math.max(0,Math.min(255,s)).toString(16).padStart(2,"0")).join("")}`;t.push(c)}return console.log(t),t}function w(n){const a=[];for(let t=0;t<n;t++){const e=[Math.floor(Math.random()*256),Math.floor(Math.random()*256),Math.floor(Math.random()*256)],c=`#${[e[0]+Math.floor(Math.random()*50)-25,e[1]+Math.floor(Math.random()*50)-25,e[2]+Math.floor(Math.random()*50)-25].map(s=>Math.max(0,Math.min(255,s)).toString(16).padStart(2,"0")).join("")}`;a.push(c)}return a}function M(n,a){const t=[];for(const e of n){let i=parseInt(e.slice(1,3),16),c=parseInt(e.slice(3,5),16),s=parseInt(e.slice(5),16);i=Math.max(0,i-a),c=Math.max(0,c-a),s=Math.max(0,s-a);const b=`#${i.toString(16)}${c.toString(16)}${s.toString(16)}`;t.push(b)}return t}return{index:o,show:r,store:f,update:m,destroy:y,colorPallete:g,darkerColors:M,randomColor:w}}const{index:x,show:_,store:j,update:E,destroy:D,colorPallete:F,darkerColors:k,randomColor:S}=p(),l={},v=async()=>{let o=await x("/chart");l.value=o,P()};v();const d={},C=$(window).width()>=768,T={scales:{y:{beginAtZero:!0},x:{ticks:{display:!!C,maxRotation:40,minRotation:40,autoSkip:!1},barPercentage:.8,categoryPercentage:.9}},responsive:!0,maintainAspectRatio:!1};function P(){d.labels=l.value.map(r=>r.name);const o=S(l.value.length);k(o,20),d.datasets=[{label:"Tür / Kitap Sayısı",data:l.value.map(r=>r.books_count),backgroundColor:o,borderColor:"#000",borderWidth:1}]}var B=document.getElementById("myChart");new Chart(B,{type:"bar",data:d,options:T});const{show:I,update:R}=p(),u=new URL(window.location.href);U(["byType","byStatus","byLibrary","byListType","search","perPage"]);$(".form-filter").change(function(){h(this.id,this.value)});$("#searchButton").click(function(){h("search",$("#search").val())});$(document).on("click",".orderBy",function(){h("orderBy",this.id)});$("#search").on("keydown",function(o){o.key==="Enter"&&$("#searchButton").trigger("click")});$(".clearUrl").click(function(){window.location.href=window.location.origin+window.location.pathname});$(document).on("click","#editType",function(){$(".storeType").attr("hidden",!0),$(".updateType").attr("hidden",!1),$(".updateType").attr("data-typeid",$(this).data("typeid")),A($(this).data("typeid"))});$(document).on("click",".updateType",function(){L($(this).data("typeid")),location.reload()});async function A(o){const r=await I("/type",o);$("#type_name").val(r.name),console.log(name)}async function L(o){await R("/type",o,{name:$("#type_name").val()})}function h(o,r){o&&u.searchParams.set(o,r),window.location.href=u.toString()}function U(o){o.map(r=>{u.searchParams.get(r)&&$("#"+r).val(u.searchParams.get(r))})}
