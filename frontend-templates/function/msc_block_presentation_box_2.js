let msc_icon_presentation_box_2 = el("img", {
    src: msc_parameters.pluginUrl + "/mir-blocks-and-shortcodes/assets/img/icons/msc_presentation_box_2.svg",
    width: "50px",
    height: "50px"
});

registerBlockType('mir-blocks-and-shortcodes/msc-presentation-box-2', {
    title: 'Presentation box 2',
    icon: msc_icon_presentation_box_2,
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
        'imageurl': {
            type: 'string',
            default: ''
        },
        'ribbon': {
            type: 'boolean',
            default: true
        },
        'ribbontext': {
            type: 'string',
            default: ''
        },
        'content': {
            type: 'string',
            default: ''
        },
        'name': {
            type: 'string',
            default: ''
        },
        'description': {
            type: 'string',
            default: ''
        },
        'animation': {
            type: 'false',
            default: false
        },
        'direction': {
            type: 'string',
            default: ''
        },
        'facebook': {
            type: 'string',
            default: ''
        },
        'twitter': {
            type: 'string',
            default: ''
        },
        'youtube': {
            type: 'string',
            default: ''
        },
        'linkedin': {
            type: 'string',
            default: ''
        },
        'xing': {
            type: 'string',
            default: ''
        },
        'google': {
            type: 'string',
            default: ''
        },
        'tumblr': {
            type: 'string',
            default: ''
        },
        'pinterest': {
            type: 'string',
            default: ''
        },
        'instagram': {
            type: 'string',
            default: ''
        },
        'vine': {
            type: 'string',
            default: ''
        },
        'digg': {
            type: 'string',
            default: ''
        },
        'dribbble': {
            type: 'string',
            default: ''
        },
        'background_color': {
            type: 'string',
            default: 'dce3ea'
        },
        'border_color': {
            type: 'string',
            default: 'b9c5d1'
        },
        'name_color': {
            type: 'string',
            default: '28527b'
        },
        'content_and_description_color': {
            type: 'string',
            default: '5a6a7a'
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
                    block: 'mir-blocks-and-shortcodes/msc-presentation-box-2',
                    attributes: props.attributes
                })
            ),

            el(InspectorControls,
                {}, [
                    el("hr", {
                        style: {marginTop: 20, marginBottom: 40}
                    }),
                    el(Controls.TextControl, {
                        label: __('Name'),
                        value: props.attributes.name,
                        onChange: (value) => {
                            props.setAttributes({name: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Description'),
                        value: props.attributes.description,
                        onChange: (value) => {
                            props.setAttributes({description: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Ribbon'),
                        checked: props.attributes.ribbon,
                        onChange: (value) => {
                            props.setAttributes({ribbon: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Ribbontext'),
                        value: props.attributes.ribbontext,
                        onChange: (value) => {
                            props.setAttributes({ribbontext: value});
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
                        allowedTypes: ['image'],
                        addToGallery: true,
                        multiple: false,
                        onSelect: (value) => {
                            props.setAttributes({imageurl: value.url});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Just set your social media link')
                    ),
                    el(Controls.TextControl, {
                        label: __('Facebook'),
                        value: props.attributes.facebook,
                        onChange: (value) => {
                            props.setAttributes({facebook: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Twitter'),
                        value: props.attributes.twitter,
                        onChange: (value) => {
                            props.setAttributes({twitter: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('YouTube'),
                        value: props.attributes.youtube,
                        onChange: (value) => {
                            props.setAttributes({youtube: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('LinkedIn'),
                        value: props.attributes.linkedin,
                        onChange: (value) => {
                            props.setAttributes({linkedin: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('XING'),
                        value: props.attributes.xing,
                        onChange: (value) => {
                            props.setAttributes({xing: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Google'),
                        value: props.attributes.google,
                        onChange: (value) => {
                            props.setAttributes({google: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Tumblr'),
                        value: props.attributes.tumblr,
                        onChange: (value) => {
                            props.setAttributes({tumblr: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Pinterest'),
                        value: props.attributes.pinterest,
                        onChange: (value) => {
                            props.setAttributes({pinterest: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Instagram'),
                        value: props.attributes.instagram,
                        onChange: (value) => {
                            props.setAttributes({instagram: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Vine'),
                        value: props.attributes.vine,
                        onChange: (value) => {
                            props.setAttributes({vine: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Digg'),
                        value: props.attributes.digg,
                        onChange: (value) => {
                            props.setAttributes({digg: value});
                        }
                    }),
                    el(Controls.TextControl, {
                        label: __('Dribbble'),
                        value: props.attributes.dribbble,
                        onChange: (value) => {
                            props.setAttributes({dribbble: value});
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
                        __('Name color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.name_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({name_color: value.hex});
                        }
                    }),
                    el(
                        'p', {
                            style: {marginTop: 20}
                        },
                        __('Content and description color')
                    ),
                    el(Controls.ColorPicker, {
                        color: props.attributes.content_and_description_color,
                        disableAlpha: true,
                        onChangeComplete: (value) => {
                            props.setAttributes({content_and_description_color: value.hex});
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