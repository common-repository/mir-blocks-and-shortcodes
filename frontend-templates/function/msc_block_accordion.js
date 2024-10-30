let el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    ServerSideRender = wp.components.ServerSideRender,
    Controls = wp.components,
    TextareaControl = wp.components.TextareaControl,
    MediaPlaceholder = wp.editor.MediaPlaceholder,
    {__} = wp.i18n,
    InspectorControls = wp.editor.InspectorControls;

let msc_icon_accordion = el("img", {
    src: msc_parameters.pluginUrl + "/mir-blocks-and-shortcodes/assets/img/icons/msc_accordion.svg",
    width: "50px",
    height: "50px"
});

registerBlockType('mir-blocks-and-shortcodes/msc-accordion', {
    title: 'Accordion',
    icon: msc_icon_accordion,
    category: 'msc-shortcodes',
    attributes: {
        'width': {
            type: 'string',
            default: "80%"
        },
        'css': {
            type: 'string',
            default: ""
        },
        'center': {
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
                    block: 'mir-blocks-and-shortcodes/msc-accordion',
                    attributes: props.attributes
                })
            ),

            el(InspectorControls,
                {}, [
                    el("hr", {
                        style: {marginTop: 20}
                    }),
                    el(Controls.TextControl, {
                        label: __('Width'),
                        value: props.attributes.width,
                        onChange: (value) => {
                            props.setAttributes({width: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 20}
                    }),
                    el(Controls.TextControl, {
                        label: __('CSS'),
                        value: props.attributes.css,
                        onChange: (value) => {
                            props.setAttributes({css: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 20}
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Center'),
                        checked: props.attributes.center,
                        onChange: (value) => {
                            props.setAttributes({center: value});
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