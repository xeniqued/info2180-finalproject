

document.addEventListener("DOMContentLoaded", function () {
  const textarea = document.getElementById('password');
  textarea.addEventListener('input', (event) => {
  const currentLength = event.target.value.length;
  textarea.value = '*'.repeat(currentLength);
});
});