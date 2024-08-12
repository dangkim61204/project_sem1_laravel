(function ($) {

    "use strict"
    const HT = {};




    HT.setupCkEditor = (object, type) => {
        if ($('.ckeditor')) {

            $('.ckeditor').each(function () {
                let elementId = $(this).attr('id');
                let elementHeight = $(this).attr('data-height');


                HT.ckeditor4(elementId, elementHeight);
            })
        }
    };


    HT.mutipleUploadImageCkediotor = () => {
        $(document).on('click', '.mutipleUploadImageCkediotor', function (e) {
            let object = $(this);
            let target = object.attr('data-target')

            HT.browerServerEditor(object, 'Images', target);
            e.preventDefault();


        })
    }
    HT.uploadAlbum = () => {
        $(document).on('click', '.upload-picture', function (e) {


            HT.browerServerAlbum();
            e.preventDefault();


        })
    }


    HT.ckeditor4 = (elementId, elementHeight) => {
        if (typeof (elementHeight) == 'undefined') {
            elementHeight = 500
        }
        CKEDITOR.replace(elementId, {
            height: 666

        })
    }



    HT.uploadImageAvatar = () => {
        $('.image_target').click(function () {
            let input = $(this);
            let type = 'Images';
            HT.browerServerAvatar(input, type);

        })
    }

    HT.uploadImageToInput = () => {
        $('.upload-image').click(function () {
            let input = $(this);
            let type = input.attr('data-type');
            HT.setupCkFinder2(input, type);
        })
    }

    HT.setupCkFinder2 = (object, type) => {
        if (typeof (type) == 'undefined') {
            type = 'Images'
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data) {
            // sau khi chọn hành động chọn ảnh thì sẽ làm gì là td của hàm này

            object.val(fileUrl);
        }
        finder.popup();
    }

    HT.browerServerAvatar = (object, type) => {
        if (typeof (type) == 'undefined') {
            type = 'Images'
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data) {
            // sau khi chọn hành động chọn ảnh thì sẽ làm gì là td của hàm này

            object.find('img').attr('src', fileUrl)
            object.siblings('input').val(fileUrl)
        }
        finder.popup();
    }
    HT.browerServerEditor = (object, type, target) => {
        if (typeof (type) == 'undefined') {
            type = 'Images'
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data, allFile) {
            var elementObject = object.attr('id');
            // sau khi chọn hành động chọn ảnh thì sẽ làm gì là td của hàm này
            var html = '';
            for (let i = 0; i < allFile.length; i++) {
                let image = allFile[i].url;
                html += '<div><figure>'
                html += '<img src="' + image + '" alt="' + image + '" >'
                html += '<figcaption>Nhập vào mô tả cho ảnh</figcaption>'
                html += '</figure></div>'



            }
            CKEDITOR.instances[target].insertHtml(html)
        }
        finder.popup();
    }
    HT.browerServerAlbum = () => {

        var type = 'Images'
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data, allFile) {

            for (let i = 0; i < allFile.length; i++) {
                let html = '';
                let image = allFile[i].url;

                html += '<li class="ui-state-default">'
                html += '<div class="thumb">'
                html += '<span class="image image-scaledown">'
                html += '<img  src="'+ image+'" alt="'+image+'">'
                html += '<input type="hidden" name="album[]" value="' + image + '">'
                html += '</span>'
                html += '<button class="delete-image"><i class="fa fa-trash"></i></button>'
                html += '</div>'
                html += '</li>'


                $('.click-to-upload').addClass('hidden');
                $('#sortable').append(html);
                $('.upload-list').removeClass('hidden');

            }

        }
        finder.popup();
    }


    HT.deleteImageAlbum = () => {
        $(document).on('click', '.delete-image', function () {
            let _this = $(this);
            _this.parents('.ui-state-default').remove();
            if ($('.ui-state-default').length == 0) {
                $('.click-to-upload').removeClass('hidden');
                $('.upload-list').addClass('hidden');
            }
        })
    }
    $(document).ready(function () {
        HT.uploadImageToInput();
        HT.setupCkEditor();
        HT.uploadImageAvatar();
        HT.mutipleUploadImageCkediotor();
        HT.uploadAlbum();
        HT.deleteImageAlbum();

    });
})(jQuery);

