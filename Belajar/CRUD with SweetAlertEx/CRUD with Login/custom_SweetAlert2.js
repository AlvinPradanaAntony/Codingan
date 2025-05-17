const notifikasi = $(".info-data").data("infodata");

if (notifikasi == "statusLogin") {
  Swal.fire({
    icon: "success",
    title: "Login Berhasil !",
    text: "Anda telah berhasil Login !, Klik OK untuk melanjutkan ke halaman berikutnya.",
  });
} else if (notifikasi == "statusEdit") {
  Swal.fire({
    icon: "success",
    title: "Update berhasil !",
    text: "Anda telah berhasil melakukan pembaruan data !",
  });
} else if (notifikasi == "statusSignUp") {
  Swal.fire({
    icon: "success",
    title: "Pendaftaran Akun berhasil !",
    text: "Anda berhasil melakukan pendaftaran akun, dan sekarang Anda dapat login !",
  });
} else if (notifikasi == "Dihapus") {
  Swal.fire({
    icon: "success",
    title: "Sukses",
    text: "Data Berhasil " + notifikasi,
  });
} else if (notifikasi == "Gagal Dihapus") {
  Swal.fire({
    icon: "error",
    title: "GAGAL",
    text: "Data " + notifikasi,
  });
} else if (notifikasi == "statusErrorPass") {
  Swal.fire({
    icon: "error",
    title: "Password Salah",
    text: "Password yang Anda Masukan Salah !",
  });
} else if (notifikasi == "statusNotFound") {
  Swal.fire({
    icon: "error",
    title: "Email salah/tidak ditemukan",
    text: "Email salah atau email tidak ditemukan !",
  });
} else if (notifikasi == "statusEmpty") {
  Swal.fire({
    icon: "error",
    title: "Harap diisi kembali !",
    text: "Email dan Password kosong !",
  });
} else if (notifikasi == "error") {
  Swal.fire({
    icon: "error",
    title: "Ada kesalahan !",
    text: "Periksa kembali data yang dimasukkan, lalu coba lagi klik daftar untuk menyelesaikan pembuatan akun !",
  });
} else if (notifikasi == "EmailHasBeenTaken") {
  Swal.fire({
    icon: "error",
    title: "Email sudah tersedia !",
    text: "Email ini sudah didaftarkan atau sudah digunakan, Harap menggunakan email lain !",
  });
} else if (notifikasi == "invalidOrExpiredToken") {
  Swal.fire({
    icon: "error",
    title: "Token Tidak Valid",
    text: "Link reset kata sandi tidak valid atau sudah kedaluwarsa. Silakan coba lagi.",
  });
} else if (notifikasi == "noTokenProvided") {
  Swal.fire({
    icon: "error",
    title: "Akses Ditolak",
    text: "Tidak ada token reset kata sandi yang diberikan.",
  });
} else if (notifikasi == "passwordResetSuccess") {
  Swal.fire({
    icon: "success",
    title: "Sukses",
    text: "Kata sandi Anda telah berhasil diubah. Silakan masuk dengan kata sandi baru Anda.",
  });
} else if (notifikasi == "passwordResetFailed") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Gagal mengubah kata sandi. Silakan coba lagi.",
  });
} else if (notifikasi == "passwordMismatch") {
  Swal.fire({
    icon: "error",
    title: "Gagal",
    text: "Kata sandi tidak cocok. Silakan coba lagi.",
  });
}

$(".delete-data").on("click", function (e) {
  e.preventDefault();
  var getLink = $(this).attr("href");

  Swal.fire({
    title: "Hapus Data?",
    text: "Data akan dihapus permanen",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus",
  }).then((result) => {
    if (result.value) {
      window.location.href = getLink;
    }
  });
});
