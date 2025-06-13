// Handle appointment booking form submission

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("appointmentForm");
  const message = document.getElementById("appointmentMessage");

  if (form) {
    form.addEventListener("submit", async function (e) {
      e.preventDefault();
      message.textContent = "";
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());

      try {
        const response = await fetch("/api/appointments", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(data),
        });
        const result = await response.json();
        if (response.ok) {
          message.style.color = "green";
          message.textContent = result.message || "Appointment booked!";
          form.reset();
        } else {
          message.style.color = "red";
          message.textContent = result.message || "Booking failed.";
        }
      } catch (err) {
        message.style.color = "red";
        message.textContent = "Network error. Please try again.";
      }
    });
  }
});
