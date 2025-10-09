    function previewImage() {
        var input = document.getElementById('image');
        var preview = document.querySelector('.img-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
        }
    }
    function previewImageA() {
        var optionA = document.getElementById('g_option_a');
        var previewA = document.querySelector('.img-previewA');

        if (optionA.files && optionA.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewA.src = e.target.result;
            };

            reader.readAsDataURL(optionA.files[0]);
        } else {
            previewA.src = '';
        }
    }
    function previewImageB() {
        var optionB = document.getElementById('g_option_b');
        var previewB = document.querySelector('.img-previewB');

        if (optionB.files && optionB.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewB.src = e.target.result;
            };

            reader.readAsDataURL(optionB.files[0]);
        } else {
            previewB.src = '';
        }
    }
    function previewImageC() {
        var optionC = document.getElementById('g_option_c');
        var previewC = document.querySelector('.img-previewC');

        if (optionC.files && optionC.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewC.src = e.target.result;
            };

            reader.readAsDataURL(optionC.files[0]);
        } else {
            previewC.src = '';
        }
    }
    function previewImageD() {
        var optionD = document.getElementById('g_option_d');
        var previewD = document.querySelector('.img-previewD');

        if (optionD.files && optionD.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewD.src = e.target.result;
            };

            reader.readAsDataURL(optionD.files[0]);
        } else {
            previewD.src = '';
        }
    }
    function previewImageE() {
        var optionE = document.getElementById('g_option_e');
        var previewE = document.querySelector('.img-previewE');

        if (optionE.files && optionE.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                previewE.src = e.target.result;
            };

            reader.readAsDataURL(optionE.files[0]);
        } else {
            previewE.src = '';
        }
    }