<footer>
    <div class="container">
        <div class="text-center">
            
        </div>
    </div>
</footer>
<script src="<?= Router::base(); ?>/assets/js/jquery-1.11.1.js"></script>
<script src="<?= Router::base(); ?>/assets/bootstrap/js/bootstrap.js"></script>



<script>
    $(function () {
        $('.dropdown').hover(function () {
            $(this).addClass('open');
        },
                function () {
                    $(this).removeClass('open');
                });
    });
</script>