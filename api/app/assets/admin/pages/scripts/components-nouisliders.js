var ComponentsNoUiSliders = function () {

    return {
        //main function to initiate the module
        init: function () {

            // slider 2
            $('#slider_2').noUiSlider({
                direction: (Metronic.isRTL() ? "rtl" : "ltr"),
                range: {
                    min: 25,
                    max: 60
                },
                start: [40, 55],
                handles: 2,
                connect: true,
                step: 1,
                serialization: {
                    lower: [
                        $.Link({
                            target: $("#slider_2_input_start"),
                            method: "val"
                        })
                    ],
                    upper: [
                        $.Link({
                            target: $("#slider_2_input_end"),
                            method: "val"
                        })
                    ]
                }

            });
        }
            
    };

}();