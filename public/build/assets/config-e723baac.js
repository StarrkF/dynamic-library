function p(){const s=async(o,n=null,t=null,a=null,c=null,e=null)=>await axios.get(o,{params:{byType:n,byStatus:a,byListType:t,byLibrary:c,search:e}},{headers:{Accept:"application/json"}}).then(function(r){return r.data}).catch(function(r){r.message}),i=async(o,n)=>await axios.get(o+"/"+n).then(function(t){return t.data}).catch(function(t){return t.message}),l=async(o,n)=>await axios.post(o,n).then(function(t){return t.data}).catch(function(t){return t.message}),u=async(o,n,t)=>await axios.put(o+"/"+n,t).then(function(a){return a.data}).catch(function(a){return a.message}),h=async(o,n)=>await axios.delete(o+"/"+n).then(function(t){return t.data}).catch(function(t){return t.message});function f(o,n){const t=[];for(let a=0;a<n;a++){const e=`#${[o[0]+Math.floor(Math.random()*50)-25,o[1]+Math.floor(Math.random()*50)-25,o[2]+Math.floor(Math.random()*50)-25].map(r=>Math.max(0,Math.min(255,r)).toString(16).padStart(2,"0")).join("")}`;t.push(e)}return t}function M(o){const n=[];for(let t=0;t<o;t++){const a=[Math.floor(Math.random()*256),Math.floor(Math.random()*256),Math.floor(Math.random()*256)],e=`#${[a[0]+Math.floor(Math.random()*50)-25,a[1]+Math.floor(Math.random()*50)-25,a[2]+Math.floor(Math.random()*50)-25].map(r=>Math.max(0,Math.min(255,r)).toString(16).padStart(2,"0")).join("")}`;n.push(e)}return n}function d(o,n){const t=[];for(const a of o){let c=parseInt(a.slice(1,3),16),e=parseInt(a.slice(3,5),16),r=parseInt(a.slice(5),16);c=Math.max(0,c-n),e=Math.max(0,e-n),r=Math.max(0,r-n);const m=`#${c.toString(16)}${e.toString(16)}${r.toString(16)}`;t.push(m)}return t}return{index:s,show:i,store:l,update:u,destroy:h,colorPallete:f,darkerColors:d,randomColor:M}}export{p as u};
