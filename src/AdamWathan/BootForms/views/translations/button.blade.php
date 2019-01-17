<a class="pull-right translation-link" href="#">Translations</a>
<div class="clearfix"></div>

<script>
    document.querySelector('.translation-link').addEventListener('click', function () {
        document.querySelector('.base-lang').classList.add('hidden');
        document.querySelector('.translations').classList.remove('hidden');
    });
</script>