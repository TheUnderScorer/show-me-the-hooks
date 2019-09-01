const path = require( 'path' );
const mode = process.env.NODE_ENV;
const webpack = require( 'webpack' );

module.exports = [
    {
        entry:        {
            app:    './src/ts/',
            styles: './src/ts/styles.ts',
        },
        resolve:      {
            extensions: [ '.ts', '.tsx', '.js' ],
        },
        plugins:      [
            new webpack.HotModuleReplacementPlugin()
        ],
        module:       {
            rules: [
                {
                    test:   /\.tsx?$/,
                    loader: 'babel-loader',
                },
                {
                    enforce: 'pre',
                    test:    /\.js$/,
                    loader:  'source-map-loader',
                },
                {
                    test: /\.(s*)css$/,
                    use:  [ 'style-loader', 'css-loader', 'sass-loader' ]
                },
                {
                    test: /\.svg/,
                    use:  {
                        loader:  'svg-url-loader',
                        options: {}
                    }
                },
                {
                    test: /\.(png|jpg|gif)$/i,
                    use:  [
                        {
                            loader:  'url-loader',
                            options: {
                                limit: 8192,
                            }
                        }
                    ]
                },
                {
                    test:    /\.(woff|woff2|eot|ttf)$/,
                    loader:  'url-loader',
                    options: {
                        limit: 100000
                    }
                }
            ]
        },
        devServer:    {
            contentBase: 'public/js',
            port:        8001,
        },
        output:       {
            filename:      'smth-[name].js',
            chunkFilename: 'smth-chunk-[name].js',
            path:          path.join( __dirname, '/public/js' ),
            publicPath:    '/wp-content/plugins/smth/public/js/'
        },
        mode,
        externals:    {
            jquery: 'jQuery'
        },
        watchOptions: {
            ignored:          [ 'tests', 'node_modules' ],
            aggregateTimeout: 1000
        }
    }
];
