!function(){var e=wp.blocks.registerBlockType,t=wp.components,r=t.ColorPalette,n=t.TextControl,t=wp.blockEditor,s=t.InspectorControls,i=(t.RichText,t.MediaUpload);console.log(MYSCRIPT.themeUri),e("assessment/header",{title:"Assessment - Header",category:"common",icon:"heading",description:"",keywords:["header"],attributes:{textString:{type:"array",source:"children",selector:"h1"},fontColor:{type:"string",default:"black"},overlayColor:{type:"string",default:"black"},backgroundImage:{type:"image",default:MYSCRIPT.themeUri+"/build/assets/src/img/how-can-we-help-you.jpg"}},edit:function(e){var t=e.setAttributes,a=e.attributes,c=e.className,o=a.fontColor,l=a.overlayColor,e=a.backgroundImage;return[React.createElement(s,null,React.createElement("div",{className:"colorselect"},React.createElement("p",null,"Select a font color:"),React.createElement(r,{value:o,onChange:function(e){t({fontColor:e})}})),React.createElement("div",{className:"colorselect"},React.createElement("p",null,"Select an overlay color:"),React.createElement(r,{value:l,onChange:function(e){t({overlayColor:e})}})),React.createElement("div",{className:"colorselect"},React.createElement("p",null,"Select a background image:"),React.createElement(i,{onSelect:function(e){t({backgroundImage:e.sizes.full.url})},type:"image",value:e,render:function(e){e=e.open;return React.createElement("button",{className:"imgselect",onClick:e},"Upload Image!")}}))),React.createElement("div",{className:c,style:{backgroundImage:"url(".concat(e,")"),backgroundSize:"cover",backgroundPosition:"center"}},React.createElement("div",{className:"overlay",style:{background:l}}),React.createElement(n,{tagName:"h1",className:"content",value:a.textString,onChange:function(e){t({textString:e})},placeholder:"Enter your text here!",style:{color:o}}))]},save:function(e){var t=e.attributes,a=e.className,c=t.fontColor,o=t.overlayColor,e=t.backgroundImage;return React.createElement("div",{className:a,style:{backgroundImage:"url(".concat(e,")"),backgroundSize:"cover",backgroundPosition:"center"}},React.createElement("div",{className:"overlay",style:{background:o}}),React.createElement("h2",{class:"content",style:{color:c}},t.textString))}})}();