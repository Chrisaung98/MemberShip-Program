<script src="{{ url('/js/jquery.js') }}"></script>
<script src="{{ url('/js/popper.js') }}"></script>
<script src="{{ url('/js/bootstrap.js') }}"></script>
<script src="{{ url('/js/util.js') }}"></script>
<script src="{{ url('/js/moment.js') }}"></script>
<script src="{{ url('/js/menu.js') }}"></script>
<script src="{{ url('/js/main.js') }}"></script>
<script type="text/javascript">
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });
    tinymce.init({
        selector: 'textarea#page_title',
        height: 300,
        block_unsupported_drop: false
    });

    tinymce.init({
        selector: 'textarea#first_3_col_text',
        height: 300,
        block_unsupported_drop: false
    });

    tinymce.init({
        selector: 'textarea#second_text',
        height: 300,
        block_unsupported_drop: false
    });

    tinymce.init({
        selector: 'textarea#faq_question',
        height: 300
    });

    tinymce.init({
        selector: 'textarea#faq_answer',
        height: 400
    });

    $("#desktop_banner_image").change(function(){
        $("#desktop_img_old").val('');
    });

    $("#mobile_banner_image").change(function(){
        $("#mobile_img_old").val('');
    });

    tinymce.init({
        selector: 'textarea',
        height: 600,
        plugins: 'anchor autolink charmap code emoticons link lists searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code',
        file_picker_types: 'image',
        block_unsupported_drop: true
    });
</script>