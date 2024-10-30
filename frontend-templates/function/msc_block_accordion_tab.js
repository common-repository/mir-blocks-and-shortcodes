registerBlockType('mir-blocks-and-shortcodes/msc-accordion-tab', {
    title: 'Accordion Tab',
    icon: msc_icon_accordion,
    category: 'msc-shortcodes',
    attributes: {
        'title': {
            type: 'string',
            default: "Tab %d"
        },
        'height': {
            type: 'string',
            default: ""
        },
        'checked': {
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
                    block: 'mir-blocks-and-shortcodes/msc-accordion-tab',
                    attributes: props.attributes
                })
            ),

            el(InspectorControls,
                {}, [
                    el("hr", {
                        style: {marginTop: 20}
                    }),
                    el(Controls.TextControl, {
                        label: __('Title'),
                        value: props.attributes.title,
                        onChange: (value) => {
                            props.setAttributes({title: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 20}
                    }),
                    el(Controls.TextControl, {
                        label: __('Height'),
                        value: props.attributes.height,
                        onChange: (value) => {
                            props.setAttributes({height: value});
                        }
                    }),
                    el("hr", {
                        style: {marginTop: 20}
                    }),
                    el(Controls.ToggleControl, {
                        label: __('Checked'),
                        checked: props.attributes.checked,
                        onChange: (value) => {
                            props.setAttributes({checked: value});
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