let btnSearch = document.querySelectorAll('.formCategory');

for (search of btnSearch) {
  if (search) { btnSearch = addEventListener('click', searchCategory); }
}

function searchCategory(event) {
  let dataForm = document.getElementById('formSearch');

  console.log('hello');
  dataForm.submit();
}