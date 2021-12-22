let btnSearch = document.querySelectorAll('.formCategory');

for (search of btnSearch) {
  if (search) { btnSearch = addEventListener('click', searchCategory); }
}

function searchCategory(event) {
  let dataForm = document.getElementById('formSearch');

  //console.log('hello');
  dataForm.submit();
}

let btnSearchMarque = document.querySelectorAll('.formMarque');

for (searchMarque of btnSearchMarque) {
  if (searchMarque) { btnSearchMarque = addEventListener('click', searchMarque); }
}

function searchMarque() {
  let dataFormMarque = document.getElementById('formMarqueSearch');
  dataFormMarque.submit();
}