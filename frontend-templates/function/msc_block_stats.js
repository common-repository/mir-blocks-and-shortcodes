let msc_icon_stats = el("img", {
    src: msc_parameters.pluginUrl + "/mir-blocks-and-shortcodes/assets/img/icons/msc_stats.svg",
    width: "50px",
    height: "50px"
});

registerBlockType('mir-blocks-and-shortcodes/msc-stats', {
    title: 'Stats',
    icon: msc_icon_stats,
    category: 'msc-shortcodes',
    attributes: {
        'from': {
            type: 'integer',
            default: 0
        },
        'to': {
            type: 'integer',
            default: 100
        },
        'speed': {
            type: 'integer',
            default: 5000
        },
        'decimals': {
            type: 'integer',
            default: 0
        },
        'background_color': {
            type: 'string',
            default: ''
        },
        'border_color': {
            type: 'string',
            default: ''
        },
        'title_color': {
            type: 'string',
            default: ''
        },
        'counter_color': {
            type: 'string',
            default: ''
        },
        'ready_animation': {
            type: 'boolean',
            default: true
        },
        'ready_animation_text': {
            type: 'string',
            default: 'Ready!'
        },
        'ready_animation_text_color': {
            type: 'string',
            default: ''
        },
        'title': {
            type: 'string',
            default: ''
        },
    },
    supports: {
        customClassName: false,
    },
    edit: (props) => {

        return [

            el("div", {},
                el(Controls.Notice, {
                        status: 'info',
                        isDismissible: false
                    }, __('Just click on the state to load/reload. If it is not reloading, please focus something else with your mouse and click again on the state.')
                ),
                el(ServerSideRender, {
                    block: 'mir-blocks-and-shortcodes/msc-stats',
                    attributes: props.attributes
                })
            ),

            el(InspectorControls,
                {}, [
                    el("hr", {
                        style: {marginTop: 20, marginBottom: 40}
                    }),
                    el(Controls.TextControl, {
                        label: __('Title'),
                        value: props.attributes.title,
                        onChange: (value) => {
                            props.setAttributes({title: value});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 30}
                        }, ''
                    ),
                    el(Controls.RangeControl, {
                        label: __('From'),
                        value: props.attributes.from,
                        onChange: (value) => {
                            props.setAttributes({from: value});
                        },
                        min: 0,
                        max: 10000
                    }),
                    el(
                        'p', {
                            style: {marginTop: 30}
                        }, ''
                    ),
                    el(Controls.RangeControl, {
                        label: __('To'),
                        value: props.attributes.to,
                        onChange: (value) => {
                            props.setAttributes({to: value});
                        },
                        min: 1,
                        max: 10000
                    }),
                    el(
                        'p', {
                            style: {marginTop: 30}
                        }, ''
                    ),
                    el(Controls.RangeControl, {
                        label: __('Speed'),
                        value: props.attributes.speed,
                        onChange: (value) => {
                            props.setAttributes({speed: value});
                        },
                        min: 1,
                        max: 100000
                    }),
                    el(
                        'p', {
                            style: {marginTop: 30}
                        }, ''
                    ),
                    el(Controls.RangeControl, {
                        label: __('Decimals'),
                        value: props.attributes.decimals,
                        onChange: (value) => {
                            props.setAttributes({decimals: value});
                        },
                        min: 0,
                        max: 4
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Background color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.background_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({background_color: value.hex});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Border color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.border_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({border_color: value.hex});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Title color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.title_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({title_color: value.hex});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Counter color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.counter_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({counter_color: value.hex});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Ready animation'),
                        checked: props.attributes.ready_animation,
                        onChange: (value) => {
                            props.setAttributes({ready_animation: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Ready animation message'),
                        value: props.attributes.ready_animation_text,
                        onChange: (value) => {
                            props.setAttributes({ready_animation_text: value});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Ready animation message color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.ready_animation_text_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({ready_animation_text_color: value.hex});
                        }
                    }),
                    el("img", {
                        className: "onload-hack-pp",
                        src: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1' %3E%3Cpath d=''/%3E%3C/svg%3E",
                        width: "0",
                        height: "0",
                        onLoad: () => {
                            $('.mp-stats-counter').each(function () {
                                $(this).countTo({
                                    from: $(this).data('from'),
                                    to: $(this).data('to'),
                                    speed: $(this).data('speed'),
                                    decimals: $(this).data('decimals'),
                                    onComplete: function (value) {
                                        $(this).addClass("mp-stats-display").delay(540).queue(function (next) {
                                            $(this).removeClass("mp-stats-display");
                                            next();
                                        });
                                        $(this).prev().removeClass("mp-stats-ready-display").delay(500).queue(function (next) {
                                            $(this).addClass("mp-stats-ready-display");
                                            next();
                                        });
                                    }
                                });
                            });
                        }
                    })
                ]
            )
        ]
    },

    save: () => {
        return null
    }
});