let el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    ServerSideRender = wp.components.ServerSideRender,
    Controls = wp.components,
    TextareaControl = wp.components.TextareaControl,
    MediaPlaceholder = wp.editor.MediaPlaceholder,
    RichText = wp.editor.RichText,
    {__} = wp.i18n,
    InspectorControls = wp.editor.InspectorControls;

let msc_icon_progress_bar = el("img", {
    src: msc_parameters.pluginUrl + "/mir-blocks-and-shortcodes/assets/img/icons/msc_progress_bar.svg",
    width: "50px",
    height: "50px"
});

registerBlockType('mir-blocks-and-shortcodes/msc-progress-bar', {
    title: 'Progress bar',
    icon: msc_icon_progress_bar,
    category: 'msc-shortcodes',
    attributes: {
        'value': {
            type: 'integer',
            default: 50
        },
        'type': {
            type: 'string',
            default: "default"
        },
        'animated': {
            type: 'boolean',
            default: false
        },
        'title': {
            type: 'string',
            default: ""
        },
        'striped': {
            type: 'boolean',
            default: false
        },
    },
    supports: {
        customClassName: false,
    },
    edit: (props) => {

        return [

            el("div", {},
                el(ServerSideRender, {
                    block: 'mir-blocks-and-shortcodes/msc-progress-bar',
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
                        label: __('Value'),
                        value: props.attributes.value,
                        onChange: (value) => {
                            props.setAttributes({value: value});
                        },
                        min: 0,
                        max: 100
                    }),
                    el(
                        'p', {
                            style: {marginTop: 30}
                        }, ''
                    ),
                    el(Controls.SelectControl, {
                        label: __('Type'),
                        value: props.attributes.type,
                        options: [
                            {label: 'default', value: 'default'},
                            {label: 'success', value: 'success'},
                            {label: 'info', value: 'info'},
                            {label: 'warning', value: 'warning'},
                            {label: 'danger', value: 'danger'}
                        ],
                        onChange: (value) => {
                            props.setAttributes({type: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 40, marginBottom: 40}
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Striped'),
                        checked: props.attributes.striped,
                        onChange: (value) => {
                            props.setAttributes({striped: value});
                        }
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Animated'),
                        checked: props.attributes.animated,
                        onChange: (value) => {
                            props.setAttributes({animated: value});
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