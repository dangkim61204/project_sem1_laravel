(function ($) {

    "use strict"
    const HT = {};
    HT.switchery = () => {
        $('.js-switch').each(function () {
            // let _this = $(this);
            var switchery = new Switchery(this, { color: '#1AB394', size: 'small' });

        })
    }
    HT.select2 = () => {
        if ($('.setupSelect2').length) {

            $('.setupSelect2').select2();
        }
    }

    HT.changStatus = () => {
        if ($('.status').length) {
            $(document).on('change', '.status', function () {
                let _this = $(this);
                let value = _this.val();
                let modelId = _this.attr('data-modelId');
                let model = _this.attr('data-model');
                let field = _this.attr('data-field');
                let _token = $('meta[name="csrf-token"]').attr('content');
                let option = {
                    'value': value,
                    'modeId': modelId,
                    'model': model,
                    'field': field,
                    '_token': _token

                }
                $.ajax({
                    type: "POST",
                    url: "ajax/dashboard/changeStatus",
                    data: option,
                    dataType: "json",
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });

            });
        }
    }

    HT.checkAll = () => {
        if ($('#checkAll').length) {
            $(document).on('click', '#checkAll', function () {
                let isChecked = $(this).prop('checked');
                $('.checkBoxItem').prop('checked', isChecked);
                $('.checkBoxItem').each(function () {
                    let _this = $(this);
                    HT.changeBackground(_this);

                });
            });
        }

    }
    HT.changeStatusAll = () => {
        if ($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function (e) {
                let _this = $(this);
                let id = [];
                $('.checkBoxItem').each(function () {
                    let checkBox = $(this);
                    if (checkBox.prop('checked')) {
                        id.push(checkBox.val());
                    }

                })

                let value = _this.attr('data-value');
                let modelId = _this.attr('data-modelId');
                let model = _this.attr('data-model');
                let field = _this.attr('data-field');
                let _token = $('meta[name="csrf-token"]').attr('content');
                let option = {
                    'value': value,
                    'model': model,
                    'field': field,
                    'id': id,
                    '_token': _token

                }



                $.ajax({
                    type: "POST",
                    url: "ajax/dashboard/changeStatusAll",
                    data: option,
                    dataType: "json",
                    success: function (res) {
                        console.log(res)

                       if(res.flag == true) {
                        let cssActive2 = 'left: 20px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s; background-color: rgb(255, 255, 255);';
                        let cssActive1 = 'background-color: rgb(26, 179, 148); border-color: rgb(26, 179, 148); box-shadow: rgb(26, 179, 148) 0px 0px 0px 15.5px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s';

                        let cssActive3 = 'box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;'
                        let cssActive4 = 'left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;'

                        if(option.value==2){
                       
                            for(let i = 0; i < id.length; i++) {
                                $('.js-switch-'+id[i]).find('span.switchery').attr('style', cssActive1).find('small').attr('style', cssActive2);
                            }
                        }else if(option.value == 1) {
                            for(let i = 0; i < id.length; i++) {
                                $('.js-switch-'+id[i]).find('span.switchery').attr('style', cssActive3).find('small').attr('style', cssActive4);
                            }
                        }
                       }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
               


                e.preventDefault();

            });


        }
    }

    HT.checkBoxItem = () => {
        if ($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem', function () {
                let _this = $(this);
                HT.changeBackground(_this);
                HT.allChecked();



            })
        }
    }

    HT.changeBackground = (object) => {
        let isChecked = object.prop('checked');
        if (isChecked) {
            object.closest('tr').addClass('active-bg')
        } else {
            object.closest('tr').removeClass('active-bg')
        }

    }

    HT.allChecked = () => {
        let allChecked = $('.checkBoxItem:checked').length === $('.checkBoxItem').length;
        $('#checkAll').prop('checked', allChecked);


    }


    HT.sortui = () => {

        $('#sortable').sortable();
        $('#sortable').disableSelection();
    }

    $(document).ready(function () {
        HT.switchery();
        HT.select2();
        HT.changStatus();
        HT.checkAll();
        HT.checkBoxItem();
        HT.allChecked();
        HT.changeStatusAll();
        HT.sortui();
    });
})(jQuery);