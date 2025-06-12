document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const email = document.querySelector('input[name="email"]').value.trim();
  const password = document.querySelector('input[name="password"]').value.trim();
  const role = document.querySelector('select[name="role"]').value;
  const loginMessage = document.getElementById('loginMessage');

  // Retrieve users from localStorage
  const users = JSON.parse(localStorage.getItem('users')) || [];

  // Find user with matching email, password, and role
  const user = users.find(u => u.email === email && u.password === password && u.role === role);

  if (user) {
    loginMessage.textContent = "Login successful! Redirecting...";
    loginMessage.style.color = "green";
    setTimeout(() => {
      window.location.href = 'dashboard.html';
    }, 1000);
  } else {
    loginMessage.textContent = "Invalid email, password, or role.";
    loginMessage.style.color = "red";
  }
});