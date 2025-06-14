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
      // Rename fields to match backend expectations
      data.doctor_id = data.doctorId;
      data.time_slot = data.timeSlot;
      // Remove unused fields
      delete data.doctorId;
      delete data.timeSlot;
    });
  }
});
