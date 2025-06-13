document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
  
    const res = await fetch('php/register.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
  
    const result = await res.json();
    document.getElementById('registerMessage').innerText = result.message;
  });