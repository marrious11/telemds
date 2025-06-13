// Handle registration form submission

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('registerForm');
  const messageDiv = document.getElementById('registerMessage');

  if (form) {
    form.addEventListener('submit', async function (e) {
      e.preventDefault();
      messageDiv.textContent = '';
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());

      try {
        const response = await fetch('/api/register', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        });
        const result = await response.json();
        if (response.ok) {
          messageDiv.style.color = 'green';
          messageDiv.textContent = result.message || 'Registration successful!';
          form.reset();
        } else {
          messageDiv.style.color = 'red';
          messageDiv.textContent = result.message || 'Registration failed.';
        }
      } catch (err) {
        messageDiv.style.color = 'red';
        messageDiv.textContent = 'Network error. Please try again.';
      }
    });
  }
});
