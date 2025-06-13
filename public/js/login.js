document.getElementById('loginForm').addEventListener('submit', async function (e) {
  e.preventDefault();

  const data = Object.fromEntries(new FormData(this));

  const res = await fetch('php/login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  });

  const result = await res.json();

  if (result.user) {
    localStorage.setItem('userId', result.user.id);
    localStorage.setItem('userRole', result.user.role);
    window.location.href = 'dashboard.html';
  } else {
    document.getElementById('loginMessage').innerText = result.message;
  }
});