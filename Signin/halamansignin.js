const root = document.documentElement;
const eye1 = document.getElementById('eyeball1');
const eye2 = document.getElementById('eyeball2');
const beam1 = document.getElementById('beam1');
const beam2 = document.getElementById('beam2');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm_password');
const form = document.getElementById("signupForm");
const usernameInput = document.getElementById("username");

form.addEventListener("submit", function(event) {
  const username = usernameInput.value.trim();
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  const errorElement = document.querySelector('.error');
  if (errorElement) errorElement.textContent = "";

  if (username.length === 0) {
      event.preventDefault();
      alert("Username tidak boleh kosong!");
      return;
  }

  if (username.length > 16) {
      event.preventDefault();
      alert("Username tidak boleh lebih dari 16 karakter!");
      return;
  }

  if (password.length < 8) {
      event.preventDefault();
      alert("Password harus minimal 8 karakter!");
      return;
  }

  if (password !== confirmPassword) {
      event.preventDefault();
      alert("Password dan Konfirmasi Password harus sama!");
  }
});

root.addEventListener('mousemove', (e) => {
  let rect = beam1.getBoundingClientRect();
  let mouseX = rect.right + (rect.width / 2); 
  let mouseY = rect.top + (rect.height / 2);
  let rad = Math.atan2(mouseX - e.pageX, mouseY - e.pageY);
  let degrees = (rad * (20 / Math.PI) * -1) - 350;

  root.style.setProperty('--beamDegrees', `${degrees}deg`);
});

// Toggle visibility password
eye1.addEventListener('click', e => {
  e.preventDefault();
  document.body.classList.toggle('show-password');
  passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.focus();
});

// Toggle visibility confirm password
eye2.addEventListener('click', e => {
  e.preventDefault();
  document.body.classList.toggle('show-password');
  confirmPasswordInput.type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
  confirmPasswordInput.focus();
});
