var container = document.getElementById('container')
var insert_data = document.querySelector('#insert')
var datalist = document.querySelector('#list')
var datalist_div = document.getElementById('datalist_div')

datalist_div.classList.add('notselected')

datalist.addEventListener('click',function(){
  container.classList.add('notselected')
  datalist_div.classList.remove('notselected')
});

insert_data.addEventListener('click',function(){
  container.classList.remove('notselected')
  datalist_div.classList.add('notselected')
})
