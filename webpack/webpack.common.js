var webpack = require('webpack');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var helpers = require('./helpers');

module.exports = {
	entry: {
		'vendor': helpers.root('webpack') + '/vendor.js',
		'app': helpers.root('app') + '/app.js',
		'css': helpers.root('app') + '/app.css'
	},

	resolve: {
		extensions: ['', '.js']
	},

	module: {
		loaders: [
			{
				test: /\.html$/,
				loader: 'html'
			},
			{
				test: /\.(png|jpe?g|gif|svg|woff|woff2|ttf|eot|ico)$/,
				loader: 'file?name=assets/[name].[hash].[ext]'
			},
			{
				test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
				loader: "url-loader?name=/[name].[hash].[ext]&limit=10000&mimetype=application/font-woff"
			},
			{
				test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
				loader: "file-loader?name=/[name].[hash].[ext]"
			},
			{
				test: /\.css$/,
				exclude: helpers.root('src', 'app'),
				loader: ExtractTextPlugin.extract('style', 'css?sourceMap')
			},
			{
				test: /\.css$/,
				include: helpers.root('src', 'app'),
				loader: 'raw'
			}
		]
	},

	plugins: [
		new webpack.optimize.CommonsChunkPlugin({
			name: ['app', 'vendor']
		}),

		new HtmlWebpackPlugin({
			inject: 'head',
			filename: helpers.root('public_html') + '/head-utils.php',
			template: helpers.root('webpack') + '/head-utils.php'
		})
	]
};
