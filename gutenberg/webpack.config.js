const defaultConfig = require( "@wordpress/scripts/config/webpack.config" );
const path          = require( 'path' );

module.exports = {
    ...defaultConfig,
    entry: [
        './src/block-header.js',
    ],
    output: {
        path     : path.join( __dirname, './dist/js' ),
        filename : '[name].js'
    }
}