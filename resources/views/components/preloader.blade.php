<!-- HTML -->
<div id="preloader-container" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.5);">
    <div id="preloader" style="width: 100px; height: 100px; display: flex; justify-content: center; align-items: center;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<script>
    // jQuery to show the preloader
    function showPreloader() {
        $('#preloader-container').show();
    }

    // jQuery to hide the preloader
    function hidePreloader() {
        $('#preloader-container').hide();
    }
    hidePreloader()

</script>
