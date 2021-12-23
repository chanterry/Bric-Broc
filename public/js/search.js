let btnSearch = document.querySelectorAll('.formCategory');

for (search of btnSearch) {
  if (search) {
    search.addEventListener('click', searchCategory);
  }
}

function searchCategory() {
  console.log('ok');
  let dataForm = document.getElementById('formSearch');

  //console.log('hello');
  dataForm.submit();
}

let btnSearchMarque = document.querySelectorAll('.formMarque');

for (searchMarque of btnSearchMarque) {
  if (searchMarque) { searchMarque.addEventListener('click', searchMarqueProduct); }
}

function searchMarqueProduct() {
  let dataFormMarque = document.getElementById('formSearch');
  dataFormMarque.submit();
}