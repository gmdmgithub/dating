function checkLoginPass(form) {
  if (
    form.login.value.trim().length == 0 ||
    form.pass.value.trim().length == 0
  ) {
    alert("Proszę podać login i hasło");
    return false;
  }
  return true;
}

function checkRegulamin(form) {
  if (!form.regulamin.checked) {
    alert("Akceptacja regulaminu jest wymagana!");
    return false;
  }
  if (
    form.imie.value.trim().length == 0 ||
    form.nazwisko.value.trim().length == 0 ||
    form.email.value.trim().length == 0 ||
    form.login.value.trim().length < 6 ||
    form.pas1.value.trim().length < 6 ||
    form.plec.value.trim().length == 0 ||
    form.rok_urodzenia.value.trim().length == 0
  ) {
    alert("Proszę wypełnić pola na formularzu oznaczone gwiazdką!");
    return false;
  }
  var wiek = parseInt(form.rok_urodzenia.value);
  if (wiek < 1918 || wiek > 2000) {
    alert("Zgodnie z regulaminem  portal dostępny tylko dla osób pełnoletnich");
    return false;
  }
  if (form.pas1.value.trim() != form.pas2.value.trim()) {
    alert("Hasła nie są poprawne");
    return false;
  }

  return true;
}
function checkProposal(form) {
  if (
    form.nick.value.trim().length == 0 ||
    form.opis.value.trim().length == 0
  ) {
    alert("Proszę wypełnić pola na formularzu oznaczone gwiazdką!");
    return false;
  }
  if (
    !form.szukam[0].checked &&
    !form.szukam[1].checked &&
    !form.szukam[2].checked &&
    !form.szukam[3].checked
  ) {
    alert("Musisz wybrać przynajmniej jedną opcję");
    return false;
  }
  return true;
}
function checkMeeting(form){
  if(form.content.value.trim().length  == 0){
    alert("Proszę wypełnić pola na formularzu oznaczone gwiazdką!");
    return false;
  }
  return true;
}
