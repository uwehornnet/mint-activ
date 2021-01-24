let mix = require('laravel-mix')

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.js?$/,
                exclude: /(node_modules|bower_components)/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: Config.babel(),
                    },
                ],
            },
        ],
    },
})

mix.sass('.source/sass/styles.sass', 'assets/css')
    .options({
        processCssUrls: false,
    })
    .js('.source/js/index.js', 'assets/js/build.js')
    .react('.source/js/postplayer/index.js', 'assets/js/postplayer.js')
