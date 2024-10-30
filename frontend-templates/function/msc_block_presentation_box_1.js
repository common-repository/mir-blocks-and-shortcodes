let msc_icon_presentation_box_1 = el("img", {
    src: msc_parameters.pluginUrl + "/mir-blocks-and-shortcodes/assets/img/icons/msc_presentation_box_1.svg",
    width: "50px",
    height: "50px"
});

registerBlockType('mir-blocks-and-shortcodes/msc-presentation-box-1', {
    title: 'Presentation box 1',
    icon: msc_icon_presentation_box_1,
    category: 'msc-shortcodes',
    attributes: {
        'css': {
            type: 'string',
            default: ''
        },
        'center': {
            type: 'boolean',
            default: false
        },
        'title': {
            type: 'string',
            default: ''
        },
        'content': {
            type: 'string',
            default: ''
        },
        'background_color': {
            type: 'string',
            default: 'e5ebee'
        },
        'border_color': {
            type: 'string',
            default: 'c9d4dd'
        },
        'title_background_color': {
            type: 'string',
            default: '28527b'
        },
        'content_color': {
            type: 'string',
            default: '5a6a7a'
        },
        'imageurl': {
            type: 'string',
            default: ''
        },
        'animation': {
            type: 'boolean',
            default: false
        },
        'direction': {
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
                    }, __('Your content just goes here ↓')
                ),
                el(RichText, {
                    value: props.attributes.content,
                    onChange: (value) => {
                        props.setAttributes({content: value});
                    },
                }),
                el(ServerSideRender, {
                    block: 'mir-blocks-and-shortcodes/msc-presentation-box-1',
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
                        __('Title background color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.title_background_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({title_background_color: value.hex});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Content color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.content_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({content_color: value.hex});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Center'),
                        checked: props.attributes.center,
                        onChange: (value) => {
                            props.setAttributes({center: value});
                        }
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Animation'),
                        checked: props.attributes.animation,
                        onChange: (value) => {
                            props.setAttributes({animation: value});
                        }
                    }),
                    el(Controls.SelectControl, {
                        label: __('Animation direction'),
                        value: props.attributes.direction,
                        options: [
                            {label: 'none', value: 'none'},
                            {label: 'left', value: 'left'},
                            {label: 'right', value: 'right'},
                            {label: 'top', value: 'top'}
                        ],
                        onChange: (value) => {
                            props.setAttributes({direction: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Pick your image')
                    ),
                    el(MediaPlaceholder, {
                        accept: "image/*",
                        allowedTypes: [ 'image' ],
                        addToGallery: true,
                        multiple: false,
                        onSelect: (value) => {
                            props.setAttributes({imageurl: value.url});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(Controls.TextControl, {
                        label: __('Custom inline css style'),
                        value: props.attributes.css,
                        onChange: (value) => {
                            props.setAttributes({css: value});
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