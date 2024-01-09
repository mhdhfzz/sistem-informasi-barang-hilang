document.addEventListener("DOMContentLoaded", function () {
  const body = document.body;
  const main = document.querySelector(".main");

  function toggleUpdateProfile() {
    body.classList.toggle("swiped-left");
  }

  // Tambahkan event listener pada tombol update profile atau elemen apa pun yang memicu bagian update profile
  const updateProfileButton = document.querySelector(".update-profile-btn");
  updateProfileButton.addEventListener("click", toggleUpdateProfile);

  // Tambahkan event listener untuk menutup bagian update profile
  const closeUpdateProfileButton = document.querySelector(
    ".close-update-profile-btn"
  );
  closeUpdateProfileButton.addEventListener("click", toggleUpdateProfile);
});
