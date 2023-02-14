const radioButtons = document.getElementById('radioButtons');

radioButtons.addEventListener('click', () => {
  radioButtons.submit();
  console.log('クリックされました');
})