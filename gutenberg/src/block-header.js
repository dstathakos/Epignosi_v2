//
// block-header.js
//
const { registerBlockType } = wp.blocks

const {
    MediaUpload
}  = wp.blockEditor

const {
    TextControl,
    TextareaControl
} = wp.components

registerBlockType('assessment/header', {
    title       : 'Assessment - Header',
    category    : 'assessment',
    icon        : 'heading',
    description : '',
    keywords    : [
        'header'
    ],

    // ..Set up data model for custom block
    attributes  : {},
    edit: ( props ) => {

        // ..Pull out the props we'll use
        const {
            attributes,
            setAttributes
        } = props

        // ..Pull out specific attributes for clarity below
        const {
        } = attributes

        return (
            <></>
        )
    },
    save: ( props ) => {
        return (
            <></>
        )
    }
})