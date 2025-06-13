document.getElementById('appointmentForm').addEventListener('submit', async function (e) {
    e.preventDefault();
  
    const data = Object.fromEntries(new FormData(this));
    data.patient_id = localStorage.getItem('userId'); // get logged-in patient ID
  
    const res = await fetch('php/book_appointment.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
  
    const result = await res.json();
    document.getElementById('appointmentMessage').innerText = result.message;
  });