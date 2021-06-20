//
// block-header.js
//
const { registerBlockType } = wp.blocks;
const { ColorPalette, TextControl } = wp.components;
const { InspectorControls, RichText, MediaUpload } = wp.blockEditor;
console.log(MYSCRIPT.themeUri);
registerBlockType("assessment/header", {
  title: "Assessment - Header",
  category: "common",
  icon: "heading",
  description: "",
  keywords: ["header"],

  // ..Set up data model for custom block
  attributes: {
    textString: {
      type: "array",
      source: "children",
      selector: "h1",
    },
    fontColor: {
      type: "string",
      default: "black",
    },
    overlayColor: {
      type: "string",
      default: "black",
    },
    backgroundImage: {
      type: "image",
      default:
        MYSCRIPT.themeUri + "/build/assets/src/img/how-can-we-help-you.jpg",
    },
  },

  edit: (props) => {
    // ..Pull out the props we'll use
    const { setAttributes, attributes, className } = props;

    // ..Pull out specific attributes for clarity below
    const { fontColor, overlayColor, backgroundImage } = attributes;

    function onTextColorChange(changes) {
      setAttributes({
        fontColor: changes,
      });
    }

    function onTextChange(changes) {
      setAttributes({
        textString: changes,
      });
    }

    function onOverlayColorChange(changes) {
      setAttributes({
        overlayColor: changes,
      });
    }

    function onImageSelect(imageObject) {
      setAttributes({
        backgroundImage: imageObject.sizes.full.url,
      });
    }

    return [
      <InspectorControls>
        <div className="colorselect">
          <p>Select a font color:</p>
          <ColorPalette value={fontColor} onChange={onTextColorChange} />
        </div>
        <div className="colorselect">
          <p>Select an overlay color:</p>
          <ColorPalette value={overlayColor} onChange={onOverlayColorChange} />
        </div>
        <div className="colorselect">
          <p>Select a background image:</p>
          <MediaUpload
            onSelect={onImageSelect}
            type="image"
            value={backgroundImage}
            render={({ open }) => (
              <button className="imgselect" onClick={open}>
                Upload Image!
              </button>
            )}
          />
        </div>
      </InspectorControls>,

      <div
        className={className}
        style={{
          backgroundImage: `url(${backgroundImage})`,
          backgroundSize: "cover",
          backgroundPosition: "center",
        }}
      >
        <div className="overlay" style={{ background: overlayColor }}></div>

        {/* Originally made it with RichText since the background on TextControl is bad on white text
         but changed due to requirments of assessment. For RichText just swap TextControl -> RichText */}

        <TextControl
          tagName="h1"
          className="content"
          value={attributes.textString}
          onChange={onTextChange}
          placeholder="Enter your text here!"
          style={{ color: fontColor }}
        />
      </div>,
    ];
  },

  save: (props) => {
    const { attributes, className } = props;
    const { fontColor, overlayColor, backgroundImage } = attributes;

    return (
      <div
        className={className}
        style={{
          backgroundImage: `url(${backgroundImage})`,
          backgroundSize: "cover",
          backgroundPosition: "center",
        }}
      >
        <div className="overlay" style={{ background: overlayColor }}></div>
        <h2 class="content" style={{ color: fontColor }}>
          {attributes.textString}
        </h2>
      </div>
    );
  },
});
