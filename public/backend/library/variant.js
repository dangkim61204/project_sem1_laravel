(function ($) {

    "use strict"
    const HT = {};

    HT.setupProductVariant = () => {

        if ($('.turnOnVariant').length) {
            $(document).on('click', '.variant-checkbox', function () {
                let _this = $(this);
                if (_this.find('input:checked').length == 0) {
                    $('.variant-wrapper').removeClass('hidden')

                } else {
                    $('.variant-wrapper').addClass('hidden')

                }
            })
        }
    }
    HT.addVariant = () => {
        if ($('.add-variant').length) {
            $(document).on('click', '.add-variant', function () {
                let html = HT.renderVariantItem(attributeCatalogue);
                $('.variant-body').append(html);
                HT.checkMaxAttributeGroup(attributeCatalogue);

                HT.disabledAttributeCatalogueChoose();
            })
        }
    }

    HT.destroyNiceSelect = () => {
        if ($('.niceSelect').length) {
            $('.niceSelect').niceSelect('destroy')
        }
    }

    HT.renderVariantItem = (attributeCatalogue) => {
        let html = '';
        html = html + ''
        html = html + '<div class="row mb20 variant-item">';
        html = html + '<div class="col-lg-4">';
        html = html + '<div class="attribute-catalogue">';
        html = html + '<select name="" id="" class="choose-attribute niceSelect">';
        html = html + '<option value="">Chọn nhom thuộc tính</option>';

        for (let i = 0; i < attributeCatalogue.length; i++) {

            html = html + '<option value="' + attributeCatalogue[i].id + '">' + attributeCatalogue[i].name + '</option>';
        }
        html = html + '</select>';
        html = html + '</div>';
        html = html + '</div>';
        html = html + '<div class="col-lg-7">';
        html = html + '<input type= "text" name = "" class="fake-variant form-control" disabled>';
        html = html + '</div>';
        html = html + '<div class="col-lg-1">';
        html = html + '<button type="button" class="btn btn-danger remove-attribute"><i class="fa fa-trash " aria-hidden="true"></i></button>';
        html = html + '</div>';
        html = html + '</div>';

        return html;
    }

    HT.niceSelect = () => {
        $('.niceSelect').niceSelect();
    }

    HT.removeAttribute = () => {
      
            $(document).on('click', '.remove-attribute', function () {
                let _this = $(this);

                _this.parents('.variant-item').remove();
                HT.checkMaxAttributeGroup(attributeCatalogue);

            })
    }


    HT.disabledAttributeCatalogueChoose = () => {
        let id = [];
        $('.choose-attribute').each(function () {
            let _this = $(this);
            let selected = _this.find('option:selected').val();
            if (selected != 0) {
                id.push(selected)
            }

        })

        $('.choose-attribute').find('option').removeAttr('disabled')
        for (let i = 0; i < id.length; i++) {
            $('.choose-attribute').find('option[value=' + id[i] + ']').prop('disabled', true)
        }


        HT.destroyNiceSelect();
        HT.niceSelect();
    }


    HT.chooseVariantGroup = () => {
        $(document).on('change', '.choose-attribute', function () {
            HT.disabledAttributeCatalogueChoose();
        })
    }
    HT.checkMaxAttributeGroup = (attributeCatalogue) => {
        let variantItem = $('.variant-item').length;
        if (variantItem >= attributeCatalogue.length) {
            $('.add-variant').remove();
        } else {
            $('.variant-foot').html
                ('<button type="button" class="add-variant">Thêm phiên bản mới</button>')
        }

    }

    $(document).ready(function () {
        HT.removeAttribute();
        // HT.setupProductVariant();
        HT.addVariant();
        HT.niceSelect();
        HT.destroyNiceSelect();
        HT.chooseVariantGroup();
        HT.checkMaxAttributeGroup();
    });
})(jQuery);