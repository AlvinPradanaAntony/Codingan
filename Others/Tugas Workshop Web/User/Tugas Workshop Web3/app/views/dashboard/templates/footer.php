<script src="<?= BASE_URL ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/js/jquery.js"></script>
<script src="<?= BASE_URL ?>/js/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#table_kegiatan').DataTable();
        $('#table_pendidikan').DataTable();
        $('#table_pengabdian').DataTable();
        $('#table_publikasi').DataTable();
    });
</script>
<script src="<?= BASE_URL ?>/js/dashboard.js"></script>
</body>

</html>