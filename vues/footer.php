<footer class="pt-3 mt-4 text-muted border-top text-center">
    &copy; 2022
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $("a[data-delete]").click(function(e) {
        e.preventDefault();
        var lien = $(this).attr("data-delete");// récupère le lien du bouton
        $("#deleteBtn").attr("href", lien);// écrit le lien sur le bouton
    });
</script>

</body>
</html>
<?php ob_end_flush() ?>