const webpack = require('webpack');
const path = require('path');

/*
 * We've enabled UglifyJSPlugin for you! This minifies your app
 * in order to load faster and run less javascript.
 *
 * https://github.com/webpack-contrib/uglifyjs-webpack-plugin
 *
 */

const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

/*
 * We've enabled commonsChunkPlugin for you. This allows your app to
 * load faster and it splits the modules you provided as entries across
 * different bundles!
 *
 * https://webpack.js.org/plugins/commons-chunk-plugin/
 *
 */

module.exports = {
	entry: {
		frontend: './lib/app/entry/frontend/frontend.jsx',
		backend: './lib/app/entry/backend/backend.jsx'
	},

	output: {
		filename: '[name].js',
		chunkFilename: '[name].js',
		path: path.resolve(__dirname, 'dist')
	},

	module: {
		rules: [
			{
				test: /\.jsx?$/,
				exclude: /node_modules/,
				loader: 'babel-loader',
				options: {
					presets: ['es2015', 'react']
				}
			}
		]
	},

	plugins: [
		new UglifyJSPlugin(),
		new webpack.optimize.CommonsChunkPlugin({
			names: ['frontend', 'backend']
		})
	]
};
